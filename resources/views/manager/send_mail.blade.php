@include('manager.header')
@include('manager.navbar')
    <!-- MAIN CONTENT -->
    <main class="main-content">
        <div class="content-wrapper">

            <!-- PAGE HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-0">Send Email</h3>
                    <small class="text-muted">
                        Compose and send an email to any recipient
                    </small>
                </div>
            </div>

             {{-- Success / Error Messages --}}
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif


            <!-- CARD -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-lg-5">

                    {{-- Email Form --}}
    <form action="{{ route('send.email.post') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf

                        <div class="row g-4">

                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Recipient Email</label>
                                <input type="email" name="to" value="{{ old('to') }}" required
                                       class="form-control form-control-lg"
                                       placeholder="user@email.com">
                                         @error('to')
                <small style="color:red;">{{ $message }}</small>
            @enderror

                            </div>

                            
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Subject</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" required 
                                       class="form-control form-control-lg"
                                       placeholder="Email subject">
                                   
                                         @error('subject')
                <small style="color:red;">{{ $message }}</small>
            @enderror
                            </div>

                           

                            <div class="col-12">
                                <label class="form-label fw-semibold">Message</label>
                                <textarea rows="7" name="message" rows="6" required 
                                          class="form-control"
                                          placeholder="Write your message..."></textarea>

                                          @error('message')
                <small style="color:red;">{{ $message }}</small>
            @enderror
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-success btn-lg px-5 rounded-3">
                                    <i class="bi bi-send me-2"></i> Send Email
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </main>

</div>

@include('manager.footer')
