<div class="contact-form-wrapper">
    @if(session('success'))
        <div class="contact-success">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">
                <span>Your Name</span>
                <span class="form-required">*</span>
            </label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="form-input @error('name') form-input-error @enderror"
                placeholder="John Doe"
                required
            >
            @error('name')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="message" class="form-label">
                <span>Your Message</span>
                <span class="form-required">*</span>
            </label>
            <textarea
                id="message"
                name="message"
                rows="5"
                class="form-input form-textarea @error('message') form-input-error @enderror"
                placeholder="Tell us about your project or inquiry..."
                required
            >{{ old('message') }}</textarea>
            @error('message')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-agreement">
            <label class="agreement-label">
                <input
                    type="checkbox"
                    name="agreement"
                    value="1"
                    class="agreement-checkbox @error('agreement') form-input-error @enderror"
                    required
                >
                <span class="agreement-box">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span class="agreement-text">
                    I hereby agree that this data will be stored and processed for the purpose of establishing contact. I am aware that I can revoke my consent at any time.
                </span>
            </label>
            @error('agreement')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="form-submit">
                <span>Send Message</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
            </button>
        </div>
    </form>
</div>

<style>
.contact-form-wrapper {
    max-width: 42rem;
    margin: 0 auto;
    position: relative;
    z-index: 10;
}

.contact-success {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, rgba(0, 212, 230, 0.15), rgba(0, 179, 193, 0.1));
    border: 1px solid rgba(0, 212, 230, 0.4);
    border-radius: 0.5rem;
    backdrop-filter: blur(8px);
    margin-bottom: 2rem;
    color: white;
}

.contact-success svg {
    width: 1.5rem;
    height: 1.5rem;
    flex-shrink: 0;
    color: #00d4e6;
}

.contact-success p {
    margin: 0;
    font-size: 0.875rem;
    color: white;
}

.contact-form {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 1rem;
    padding: 2.5rem;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

.contact-form::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, #00d4e6, transparent);
}

.form-group {
    margin-bottom: 1.75rem;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.9);
    letter-spacing: 0.025em;
}

.form-required {
    color: #00d4e6;
}

.form-input {
    width: 100%;
    padding: 0.875rem 1.125rem;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 0.5rem;
    color: white;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(8px);
}

.form-input::placeholder {
    color: rgba(255, 255, 255, 0.4);
}

.form-input:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.15);
    border-color: #00d4e6;
    box-shadow: 0 0 0 3px rgba(0, 212, 230, 0.15);
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
    font-family: inherit;
}

.form-input-error {
    border-color: rgba(239, 68, 68, 0.6);
}

.form-error {
    display: block;
    margin-top: 0.5rem;
    font-size: 0.8125rem;
    color: rgba(255, 150, 150, 0.9);
}

.form-agreement {
    margin-bottom: 2rem;
}

.agreement-label {
    display: flex;
    gap: 0.875rem;
    cursor: pointer;
    align-items: flex-start;
}

.agreement-checkbox {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

.agreement-box {
    width: 1.375rem;
    height: 1.375rem;
    flex-shrink: 0;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 0.375rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.05);
    transition: all 0.3s ease;
    margin-top: 0.125rem;
}

.agreement-box svg {
    width: 1rem;
    height: 1rem;
    color: white;
    opacity: 0;
    transform: scale(0.7);
    transition: all 0.2s ease;
}

.agreement-checkbox:checked + .agreement-box {
    background: linear-gradient(135deg, #00d4e6, #00b3c1);
    border-color: #00d4e6;
}

.agreement-checkbox:checked + .agreement-box svg {
    opacity: 1;
    transform: scale(1);
}

.agreement-label:hover .agreement-box {
    border-color: rgba(0, 212, 230, 0.6);
    background: rgba(0, 212, 230, 0.1);
}

.agreement-text {
    font-size: 0.8125rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
}

.form-actions {
    display: flex;
    justify-content: center;
}

.form-submit {
    display: inline-flex;
    align-items: center;
    gap: 0.625rem;
    padding: 1rem 2.5rem;
    background: linear-gradient(135deg, #00d4e6, #00b3c1);
    border: none;
    border-radius: 0.5rem;
    color: white;
    font-size: 0.9375rem;
    font-weight: 500;
    letter-spacing: 0.025em;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.form-submit::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), transparent);
    opacity: 0;
    transition: opacity 0.3s;
}

.form-submit:hover {
    background: linear-gradient(135deg, #00b3c1, #00d4e6);
    box-shadow: 0 24px 48px rgba(0, 212, 230, 0.4);
    transform: translateY(-2px);
}

.form-submit:hover::before {
    opacity: 1;
}

.form-submit:active {
    transform: translateY(0);
}

.form-submit svg {
    width: 1.125rem;
    height: 1.125rem;
    transition: transform 0.3s ease;
}

.form-submit:hover svg {
    transform: translateX(0.25rem);
}

@media (max-width: 640px) {
    .contact-form {
        padding: 1.75rem;
    }

    .form-submit {
        width: 100%;
        justify-content: center;
    }
}
</style>