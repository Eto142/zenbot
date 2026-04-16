
@include('home.header')
 
 <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="content-wrapper">


<div class="content-wrapper">
    <h3 class="mb-4">Sent Emails</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>To</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Sent At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($emails as $email)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $email->to }}</td>
                        <td>{{ $email->subject }}</td>
                        <td>{{ Str::limit($email->message, 50) }}</td>
                        <td>{{ $email->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No emails sent yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $emails->links() }} {{-- Pagination --}}
        </div>
    </div>
</div>

   </div>
    </main>

</div>


@include('home.footer')
