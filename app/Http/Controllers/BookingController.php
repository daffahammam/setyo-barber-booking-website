<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::query()
            ->when($request->filled('date'), fn($q) => $q->where('date', $request->date))
            ->when($request->filled('barber'), fn($q) => $q->where('barber', $request->barber))
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->orderBy('date', 'desc')->orderBy('time', 'asc')
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('bookings.create', ['timeSlots' => $this->generateTimeSlots()]);
    }

    public function add()
    {
        return view('bookings.add', ['timeSlots' => $this->generateTimeSlots()]);
    }

    private function generateTimeSlots(): array
    {
        $slots = [];
        $start = strtotime('10:00');
        $end = strtotime('21:00');

        while ($start <= $end) {
            $time = date('H:i', $start);
            if ($time >= '12:00' && $time < '13:00') {
                $start = strtotime('+15 minutes', $start);
                continue;
            }
            $slots[] = $time;
            $start = strtotime('+15 minutes', $start);
        }

        return $slots;
    }

    private function formatNomorIndo($nomor): string
    {
        $nomor = preg_replace('/[^0-9]/', '', $nomor);
        return (str_starts_with($nomor, '0')) ? '62' . substr($nomor, 1) : $nomor;
    }

    public function store(Request $request)
    {
        $this->validateBooking($request);

        if ($this->isSlotTaken($request)) {
            return back()->with('error', 'Slot ini sudah dibooking!');
        }

        Booking::create($this->formatBookingData($request));

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil!');
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $this->validateBooking($request);

        if ($this->isSlotTaken($request)) {
            return back()->with('error', 'Slot ini sudah dibooking!');
        }

        $booking = Booking::create($this->formatBookingData($request));

        $pesanAdmin = "📥 Booking Baru Masuk:\n" .
            "- Nama: {$booking->name}\n" .
            "- No HP: {$booking->phone}\n" .
            "- Capster: {$booking->barber}\n" .
            "- Tanggal: {$booking->date}\n" .
            "- Jam: {$booking->time}";

        $this->sendWhatsapp(env('ADMIN_WA_NUMBER'), $pesanAdmin);

        return redirect()->route('bookings.show')->with('success', 'Booking berhasil!');
    }

    public function show(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());

        $bookings = Booking::where('date', $date)
            ->when($request->barber, fn($q) => $q->where('barber', $request->barber))
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->orderBy('time', 'asc')
            ->get()
            ->groupBy('date');

        return view('bookings.show', compact('bookings', 'date'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.edit', [
            'booking' => $booking,
            'timeSlots' => $this->generateTimeSlots()
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'barber' => ['required', Rule::in(['Setyo', 'Thariq'])],
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => ['required', Rule::in(['diterima', 'proses', 'selesai'])],
        ]);

        if ($this->isSlotTaken($request, $booking->id)) {
            return back()->with('error', 'Slot waktu ini sudah diambil.');
        }

        $booking->update($request->only(['name', 'phone', 'barber', 'date', 'time', 'status']));

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus.');
    }

    public function chat($id)
    {
        $booking = Booking::findOrFail($id);

        $pesanCustomer = "📥 Terimakasih Sudah Booking Setyo Barbershop:\n" .
            "- Nama: {$booking->name}\n" .
            "- No HP: {$booking->phone}\n" .
            "- Capster: {$booking->barber}\n" .
            "- Tanggal: {$booking->date}\n" .
            "- Jam: {$booking->time}\n" .
            "- Jangan lupa, Ditunggu kedatangannya frenn!!";

        $this->sendWhatsapp($this->formatNomorIndo($booking->phone), $pesanCustomer);

        return back()->with('success', "Pesan berhasil dikirim ke {$booking->name} ({$booking->phone})");
    }

    private function validateBooking(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'barber' => ['required', Rule::in(['Setyo', 'Thariq'])],
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);
    }

    private function isSlotTaken(Request $request, $excludeId = null): bool
    {
        $query = Booking::where('barber', $request->barber)
            ->where('date', $request->date)
            ->where('time', $request->time);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }

    private function formatBookingData(Request $request): array
    {
        return [
            'name' => $request->name,
            'phone' => $this->formatNomorIndo($request->phone),
            'barber' => $request->barber,
            'date' => $request->date,
            'time' => $request->time,
        ];
    }

    private function sendWhatsapp(string $target, string $message): void
    {
        $token = env('TOKEN_FONTE');

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.fonnte.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => [
                'target' => $target,
                'message' => $message,
            ],
            CURLOPT_HTTPHEADER => [
                "Authorization: $token",
            ],
        ]);
        curl_exec($curl);
        curl_close($curl);
    }
}
