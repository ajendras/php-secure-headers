<?php
class SecureHeaders {
    private array $headers = [
        'Content-Security-Policy' => "default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self' data:; font-src 'self'; connect-src 'self';",
        'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains; preload',
        'X-Content-Type-Options' => 'nosniff',
        'X-Frame-Options' => 'DENY',
        'Referrer-Policy' => 'strict-origin-when-cross-origin',
        'Permissions-Policy' => 'geolocation=(), microphone=(), camera=()',
    ];
    private ?string $nonce = null;

    public function nonce(): string {
        if (!$this->nonce) {
            $this->nonce = base64_encode(random_bytes(16));
            $this->headers['Content-Security-Policy'] = str_replace("'self'", "'self' 'nonce-{$this->nonce}'", $this->headers['Content-Security-Policy']);
        }
        return $this->nonce;
    }

    public function send(): void {
        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }
    }

    public function set(string $name, string $value): void {
        $this->headers[$name] = $value;
    }
}