@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran - Beras Kartini')

@section('content')
    <section class="payment-confirmation" style="padding-top: 120px; background-color: var(--latte); min-height: 100vh;">
        <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 40px 20px;">
            
            <!-- Header -->
            <div class="payment-header" style="text-align: center; margin-bottom: 40px;">
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <i class="fas fa-check-circle" style="font-size: 60px; color: #28a745; margin-bottom: 20px;"></i>
                    <h1 style="color: var(--coklat); font-size: 28px; margin-bottom: 10px;">Pesanan Berhasil Dibuat!</h1>
                    <p style="color: var(--hijau2); font-size: 16px; margin-bottom: 15px;">
                        Nomor Pesanan: <strong style="color: var(--hijau);">#{{ $order->order_number }}</strong>
                    </p>
                    <p style="color: var(--sage); font-size: 14px;">
                        Silakan lakukan pembayaran sesuai instruksi di bawah ini
                    </p>
                </div>
            </div>

            <div class="payment-content" style="display: grid; grid-template-columns: 1fr 400px; gap: 40px;">
                
                <!-- Payment Instructions -->
                <div class="payment-instructions">
                    
                    <!-- Bank Transfer Details -->
                    <div class="bank-details" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <h3 style="color: var(--coklat); margin-bottom: 25px; font-size: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-university"></i> Transfer ke Rekening Bank
                        </h3>
                        
                        <div class="bank-accounts" style="display: grid; gap: 20px;">
                            <!-- BCA -->
                            <div class="bank-account" style="border: 2px solid var(--sage); border-radius: 12px; padding: 20px; transition: all 0.3s ease;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <div style="width: 60px; height: 40px; background: #0066cc; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;">
                                        BCA
                                    </div>
                                    <div>
                                        <h4 style="color: var(--coklat); margin: 0; font-size: 16px;">Bank Central Asia</h4>
                                        <p style="color: var(--sage); margin: 0; font-size: 14px;">a/n Fachmita Qiyas Amalina</p>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-size: 20px; font-weight: bold; color: var(--hijau); font-family: monospace;">64.60.21.65.49</span>
                                    <button onclick="copyToClipboard('6460216549')" style="background: var(--sage); color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 12px;">
                                        <i class="fas fa-copy"></i> Copy
                                    </button>
                                </div>
                            </div>

                            <!-- BNI -->
                            <div class="bank-account" style="border: 2px solid var(--sage); border-radius: 12px; padding: 20px; transition: all 0.3s ease;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <div style="width: 60px; height: 40px; background: #ff6600; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 14px;">
                                        BNI
                                    </div>
                                    <div>
                                        <h4 style="color: var(--coklat); margin: 0; font-size: 16px;">Bank Negara Indonesia</h4>
                                        <p style="color: var(--sage); margin: 0; font-size: 14px;">a/n Fachmita Qiyas Amalina</p>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-size: 20px; font-weight: bold; color: var(--hijau); font-family: monospace;">0437 641 675</span>
                                    <button onclick="copyToClipboard('0437641675')" style="background: var(--sage); color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 12px;">
                                        <i class="fas fa-copy"></i> Copy
                                    </button>
                                </div>
                            </div>

                            <!-- Jenius -->
                            <div class="bank-account" style="border: 2px solid var(--sage); border-radius: 12px; padding: 20px; transition: all 0.3s ease;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <div style="width: 60px; height: 40px; background: #00d4ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 12px;">
                                        Jenius
                                    </div>
                                    <div>
                                        <h4 style="color: var(--coklat); margin: 0; font-size: 16px;">Jenius BTPN</h4>
                                        <p style="color: var(--sage); margin: 0; font-size: 14px;">a/n Fachmita Qiyas Amalina</p>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-size: 20px; font-weight: bold; color: var(--hijau); font-family: monospace;">9001 0243 336</span>
                                    <button onclick="copyToClipboard('90010243336')" style="background: var(--sage); color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 12px;">
                                        <i class="fas fa-copy"></i> Copy
                                    </button>
                                </div>
                            </div>

                            <!-- Mandiri -->
                            <div class="bank-account" style="border: 2px solid var(--sage); border-radius: 12px; padding: 20px; transition: all 0.3s ease;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                                    <div style="width: 60px; height: 40px; background: #003d82; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 12px;">
                                        Mandiri
                                    </div>
                                    <div>
                                        <h4 style="color: var(--coklat); margin: 0; font-size: 16px;">Bank Mandiri</h4>
                                        <p style="color: var(--sage); margin: 0; font-size: 14px;">a/n Sutardja</p>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span style="font-size: 20px; font-weight: bold; color: var(--hijau); font-family: monospace;">101 00 1019 2159</span>
                                    <button onclick="copyToClipboard('10100101921159')" style="background: var(--sage); color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 12px;">
                                        <i class="fas fa-copy"></i> Copy
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Transfer Amount -->
                        <div style="background: rgba(88, 112, 66, 0.1); border-radius: 12px; padding: 20px; margin-top: 25px; border-left: 4px solid var(--hijau);">
                            <h4 style="color: var(--coklat); margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-money-bill-wave"></i> Jumlah Transfer
                            </h4>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 24px; font-weight: bold; color: var(--hijau);">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                <button onclick="copyToClipboard('{{ $order->total_amount }}')" style="background: var(--hijau); color: white; border: none; padding: 8px 12px; border-radius: 6px; cursor: pointer; font-size: 12px;">
                                    <i class="fas fa-copy"></i> Copy Nominal
                                </button>
                            </div>
                            <p style="color: var(--sage); font-size: 12px; margin: 10px 0 0 0;">
                                <i class="fas fa-info-circle"></i> Transfer sesuai nominal exact untuk mempercepat verifikasi
                            </p>
                        </div>
                    </div>

                    <!-- Upload Proof -->
                    <div class="upload-proof" style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <h3 style="color: var(--coklat); margin-bottom: 25px; font-size: 20px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-upload"></i> Upload Bukti Pembayaran
                        </h3>
                        
                        <form id="proofUploadForm" action="{{ route('payment.upload-proof') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--coklat);">
                                    Pilih File Bukti Transfer *
                                </label>
                                <div class="file-upload-area" style="border: 2px dashed var(--sage); border-radius: 12px; padding: 40px; text-align: center; cursor: pointer; transition: all 0.3s ease;">
                                    <input type="file" name="payment_proof" id="paymentProof" accept="image/*" required style="display: none;">
                                    <div class="upload-content">
                                        <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: var(--sage); margin-bottom: 15px;"></i>
                                        <p style="color: var(--coklat); font-weight: 600; margin-bottom: 5px;">Klik untuk upload bukti transfer</p>
                                        <p style="color: var(--sage); font-size: 14px; margin: 0;">Format: JPG, PNG, PDF (Max: 5MB)</p>
                                    </div>
                                    <div class="file-preview" style="display: none;">
                                        <img id="previewImage" style="max-width: 200px; max-height: 200px; border-radius: 8px; margin-bottom: 10px;">
                                        <p id="fileName" style="color: var(--hijau); font-weight: 600; margin: 0;"></p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-bottom: 20px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--coklat);">
                                    Bank Pengirim *
                                </label>
                                <select name="sender_bank" required style="width: 100%; padding: 12px; border: 2px solid var(--sage); border-radius: 8px; font-size: 16px;">
                                    <option value="">Pilih Bank Pengirim</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="CIMB">CIMB Niaga</option>
                                    <option value="Danamon">Danamon</option>
                                    <option value="Permata">Permata</option>
                                    <option value="BTN">BTN</option>
                                    <option value="Jenius">Jenius</option>
                                    <option value="OVO">OVO</option>
                                    <option value="DANA">DANA</option>
                                    <option value="GoPay">GoPay</option>
                                    <option value="ShopeePay">ShopeePay</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div style="margin-bottom: 20px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--coklat);">
                                    Nama Pengirim *
                                </label>
                                <input type="text" name="sender_name" required placeholder="Nama sesuai rekening pengirim"
                                       style="width: 100%; padding: 12px; border: 2px solid var(--sage); border-radius: 8px; font-size: 16px;">
                            </div>

                            <div style="margin-bottom: 25px;">
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--coklat);">
                                    Catatan (Opsional)
                                </label>
                                <textarea name="notes" rows="3" placeholder="Catatan tambahan..."
                                          style="width: 100%; padding: 12px; border: 2px solid var(--sage); border-radius: 8px; font-size: 16px; resize: vertical;"></textarea>
                            </div>

                            <button type="submit" style="width: 100%; background: linear-gradient(135deg, var(--hijau), var(--hijau2)); color: white; border: none; padding: 15px; border-radius: 12px; font-size: 16px; font-weight: bold; cursor: pointer; transition: all 0.3s ease;">
                                <i class="fas fa-paper-plane"></i> Kirim Bukti Pembayaran
                            </button>
                        </form>
                    </div>

                    <!-- WhatsApp Contact -->
                    <div class="whatsapp-contact" style="background: linear-gradient(135deg, #25d366, #128c7e); padding: 25px; border-radius: 12px; text-align: center; color: white;">
                        <h3 style="margin-bottom: 15px; font-size: 18px;">
                            <i class="fab fa-whatsapp"></i> Konfirmasi via WhatsApp
                        </h3>
                        <p style="margin-bottom: 20px; font-size: 14px; opacity: 0.9;">
                            Setelah transfer, hubungi kami untuk konfirmasi lebih cepat
                        </p>
                        <a href="https://wa.me/6281394450704?text=Halo,%20saya%20sudah%20melakukan%20pembayaran%20untuk%20pesanan%20%23{{ $order->order_number }}%20sebesar%20Rp%20{{ number_format($order->total_amount, 0, ',', '.') }}.%20Mohon%20segera%20diproses.%20Terima%20kasih." 
                           target="_blank"
                           style="background: white; color: #25d366; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease;">
                            <i class="fab fa-whatsapp"></i> +62 813-9445-0704
                        </a>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); position: sticky; top: 140px;">
                        <h3 style="color: var(--coklat); margin-bottom: 25px; font-size: 18px; text-align: center;">
                            <i class="fas fa-receipt"></i> Detail Pesanan
                        </h3>
                        
                        <!-- Order Info -->
                        <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #f0f0f0;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: var(--sage); font-size: 14px;">Nomor Pesanan:</span>
                                <span style="color: var(--coklat); font-weight: bold; font-size: 14px;">#{{ $order->order_number }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                                <span style="color: var(--sage); font-size: 14px;">Tanggal:</span>
                                <span style="color: var(--coklat); font-size: 14px;">{{ $order->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span style="color: var(--sage); font-size: 14px;">Status:</span>
                                <span style="color: #ffc107; font-weight: bold; font-size: 14px;">Menunggu Pembayaran</span>
                            </div>
                        </div>

                        <!-- Customer Info -->
                        <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #f0f0f0;">
                            <h4 style="color: var(--coklat); margin-bottom: 10px; font-size: 16px;">Informasi Pembeli</h4>
                            <p style="color: var(--sage); font-size: 14px; margin: 0; line-height: 1.5;">
                                <strong>{{ $order->customer_name }}</strong><br>
                                {{ $order->customer_email }}<br>
                                {{ $order->customer_phone }}
                            </p>
                        </div>

                        <!-- Shipping Info -->
                        <div style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #f0f0f0;">
                            <h4 style="color: var(--coklat); margin-bottom: 10px; font-size: 16px;">Alamat Pengiriman</h4>
                            <p style="color: var(--sage); font-size: 14px; margin: 0; line-height: 1.5;">
                                {{ $order->shipping_address }}<br>
                                {{ $order->shipping_city }}, {{ $order->shipping_postal_code }}<br>
                                {{ $order->shipping_province }}
                            </p>
                        </div>

                        <!-- Order Items -->
                        <div style="margin-bottom: 20px;">
                            <h4 style="color: var(--coklat); margin-bottom: 15px; font-size: 16px;">Item Pesanan</h4>
                            @foreach($order->items as $item)
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding: 10px; background: #f8f9fa; border-radius: 8px;">
                                    <div>
                                        <p style="color: var(--coklat); font-weight: 600; margin: 0; font-size: 14px;">{{ $item->product_name }}</p>
                                        <p style="color: var(--sage); margin: 0; font-size: 12px;">{{ $item->quantity }}x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                    <span style="color: var(--hijau); font-weight: bold; font-size: 14px;">
                                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Total -->
                        <div style="border-top: 2px solid var(--sage); padding-top: 15px;">
                            <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: bold;">
                                <span style="color: var(--coklat);">Total Pembayaran</span>
                                <span style="color: var(--hijau);">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
.bank-account:hover {
    border-color: var(--hijau);
    background: rgba(88, 112, 66, 0.05);
}

.file-upload-area:hover {
    border-color: var(--hijau);
    background: rgba(88, 112, 66, 0.05);
}

.file-upload-area.dragover {
    border-color: var(--hijau);
    background: rgba(88, 112, 66, 0.1);
}

button:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.whatsapp-contact a:hover {
    background: #f0f0f0;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .payment-content {
        grid-template-columns: 1fr !important;
    }
    
    .order-summary {
        order: -1;
    }
    
    .bank-accounts {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
// File upload handling
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('paymentProof');
    const uploadArea = document.querySelector('.file-upload-area');
    const uploadContent = document.querySelector('.upload-content');
    const filePreview = document.querySelector('.file-preview');
    const previewImage = document.getElementById('previewImage');
    const fileName = document.getElementById('fileName');

    uploadArea.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', handleFileSelect);

    // Drag and drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFileSelect();
        }
    });

    function handleFileSelect() {
        const file = fileInput.files[0];
        if (file) {
            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                showNotification('File terlalu besar. Maksimal 5MB.', 'error');
                fileInput.value = '';
                return;
            }

            // Validate file type
            if (!file.type.startsWith('image/') && file.type !== 'application/pdf') {
                showNotification('Format file tidak didukung. Gunakan JPG, PNG, atau PDF.', 'error');
                fileInput.value = '';
                return;
            }

            // Show preview
            uploadContent.style.display = 'none';
            filePreview.style.display = 'block';
            fileName.textContent = file.name;

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
            }
        }
    }
});

// Form submission
document.getElementById('proofUploadForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
    submitBtn.disabled = true;
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(data.message, 'success');
            // Redirect to success page or reload
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        } else {
            showNotification(data.message || 'Terjadi kesalahan', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Terjadi kesalahan saat mengirim bukti pembayaran', 'error');
    })
    .finally(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});

// Copy to clipboard function
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        showNotification('Berhasil disalin ke clipboard', 'success');
    }).catch(() => {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        showNotification('Berhasil disalin ke clipboard', 'success');
    });
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 8px;
        color: white;
        font-weight: bold;
        z-index: 9999;
        animation: slideIn 0.3s ease;
        ${type === 'success' ? 'background: #28a745;' : 'background: #dc3545;'}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Add CSS for notification animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
`;
document.head.appendChild(style);
</script>
@endpush