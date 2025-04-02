document.addEventListener('DOMContentLoaded', function() {
    // Language Switcher
    const languageSwitcher = document.querySelector('.language-switcher');
    const currentLanguage = document.querySelector('.current-language');
    const languageDropdown = document.querySelector('.language-dropdown');

    if (currentLanguage && languageDropdown) {
        let isDropdownOpen = false;

        const openDropdown = () => {
            currentLanguage.classList.add('active');
            languageDropdown.classList.add('show');
            isDropdownOpen = true;
        };

        const closeDropdown = () => {
            currentLanguage.classList.remove('active');
            languageDropdown.classList.remove('show');
            isDropdownOpen = false;
        };

        currentLanguage.addEventListener('click', (e) => {
            e.stopPropagation();
            if (isDropdownOpen) {
                closeDropdown();
            } else {
                openDropdown();
            }
        });

        // Close language dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!languageSwitcher.contains(e.target) && isDropdownOpen) {
                closeDropdown();
            }
        });

        // Close language dropdown when pressing Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isDropdownOpen) {
                closeDropdown();
            }
        });

        // Handle keyboard navigation in dropdown
        languageDropdown.addEventListener('keydown', (e) => {
            if (!isDropdownOpen) return;

            const items = Array.from(languageDropdown.querySelectorAll('a'));
            const currentIndex = items.indexOf(document.activeElement);

            switch (e.key) {
                case 'ArrowUp':
                    e.preventDefault();
                    const prevIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1;
                    items[prevIndex].focus();
                    break;
                case 'ArrowDown':
                    e.preventDefault();
                    const nextIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0;
                    items[nextIndex].focus();
                    break;
                case 'Home':
                    e.preventDefault();
                    items[0].focus();
                    break;
                case 'End':
                    e.preventDefault();
                    items[items.length - 1].focus();
                    break;
            }
        });

        // Close language dropdown when selecting a language
        languageDropdown.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                closeDropdown();
            });
        });
    }

    // Mobile Menu
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');
    
    if (mobileMenuBtn && navLinks) {
        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('show');
            const icon = mobileMenuBtn.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!navLinks.contains(e.target) && !mobileMenuBtn.contains(e.target) && navLinks.classList.contains('show')) {
                navLinks.classList.remove('show');
                const icon = mobileMenuBtn.querySelector('i');
                if (icon) {
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-times');
                }
            }
        });

        // Close menu when clicking on a link
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('show');
                const icon = mobileMenuBtn.querySelector('i');
                if (icon) {
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-times');
                }
            });
        });
    }

    const formatSelect = document.getElementById('format');
    const formatFields = document.getElementById('format-fields');
    const previewContainer = document.getElementById('preview-container');
    const previewQR = document.getElementById('preview-qr');
    
    formatSelect.addEventListener('change', updateFormatFields);

    // Load QR code history when page loads
    loadQRHistory();

    // Add form validation
    window.validateForm = function() {
        const format = formatSelect.value;
        let isValid = true;
        let errorMessage = '';

        switch(format) {
            case 'text':
            case 'url':
                const data = document.getElementById('data').value.trim();
                if (!data) {
                    errorMessage = 'QR kod içeriği boş olamaz.';
                    isValid = false;
                }
                break;
            case 'vcard':
                const name = document.getElementById('vcard-name')?.value.trim();
                if (!name) {
                    errorMessage = 'Ad Soyad alanı zorunludur.';
                    isValid = false;
                }
                break;
            case 'wifi':
                const ssid = document.getElementById('wifi-ssid')?.value.trim();
                if (!ssid) {
                    errorMessage = 'Ağ adı (SSID) zorunludur.';
                    isValid = false;
                }
                break;
            case 'email':
                const email = document.getElementById('email-address')?.value.trim();
                if (!email) {
                    errorMessage = 'E-posta adresi zorunludur.';
                    isValid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    errorMessage = 'Geçerli bir e-posta adresi giriniz.';
                    isValid = false;
                }
                break;
        }

        if (!isValid) {
            alert(errorMessage);
            return false;
        }
        return true;
    };

    function updateFormatFields() {
        const format = formatSelect.value;
        formatFields.innerHTML = '';

        switch(format) {
            case 'vcard':
                formatFields.innerHTML = `
                    <div class="form-group">
                        <label for="vcard-name">${document.getElementById('vcard-name-label').dataset.label}</label>
                        <input type="text" id="vcard-name" name="vcard-name" required>
                    </div>
                    <div class="form-group">
                        <label for="vcard-phone">${document.getElementById('vcard-phone-label').dataset.label}</label>
                        <input type="tel" id="vcard-phone" name="vcard-phone">
                    </div>
                    <div class="form-group">
                        <label for="vcard-email">${document.getElementById('vcard-email-label').dataset.label}</label>
                        <input type="email" id="vcard-email" name="vcard-email">
                    </div>
                    <div class="form-group">
                        <label for="vcard-org">${document.getElementById('vcard-org-label').dataset.label}</label>
                        <input type="text" id="vcard-org" name="vcard-org">
                    </div>
                `;
                break;
            case 'wifi':
                formatFields.innerHTML = `
                    <div class="form-group">
                        <label for="wifi-ssid">Ağ Adı (SSID):</label>
                        <input type="text" id="wifi-ssid" name="wifi-ssid" required>
                    </div>
                    <div class="form-group">
                        <label for="wifi-password">Şifre:</label>
                        <input type="password" id="wifi-password" name="wifi-password">
                    </div>
                    <div class="form-group">
                        <label for="wifi-type">Güvenlik Türü:</label>
                        <select id="wifi-type" name="wifi-type">
                            <option value="WPA">WPA/WPA2</option>
                            <option value="WEP">WEP</option>
                            <option value="nopass">Şifresiz</option>
                        </select>
                    </div>
                `;
                break;
            case 'email':
                formatFields.innerHTML = `
                    <div class="form-group">
                        <label for="email-address">E-posta Adresi:</label>
                        <input type="email" id="email-address" name="email-address" required>
                    </div>
                    <div class="form-group">
                        <label for="email-subject">Konu:</label>
                        <input type="text" id="email-subject" name="email-subject">
                    </div>
                    <div class="form-group">
                        <label for="email-body">Mesaj:</label>
                        <textarea id="email-body" name="email-body" rows="4"></textarea>
                    </div>
                `;
                break;
        }
    }
    
    // Initialize format fields
    updateFormatFields();
});

window.previewQR = function() {
    const data = formatQRData();
    if (!data) return;

    const size = document.getElementById('size').value;
    const foreground = document.getElementById('foreground').value.substring(1);
    const background = document.getElementById('background').value.substring(1);
    
    const previewContainer = document.getElementById('preview-container');
    const previewQR = document.getElementById('preview-qr');
    
    previewQR.innerHTML = '';
    previewContainer.style.display = 'block';
    
    // Use fetch with POST to avoid Request-URI Too Long error
    fetch('generate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `data=${encodeURIComponent(data)}&size=${size}&foreground=${foreground}&background=${background}&preview=true`
    })
    .then(response => response.blob())
    .then(blob => {
        const img = new Image();
        const url = URL.createObjectURL(blob);
        img.src = url;
        img.alt = 'QR Kod Önizleme';
        img.onload = function() {
            previewQR.appendChild(img);
            // Clean up the object URL after the image is loaded
            URL.revokeObjectURL(url);
        };
    })
    .catch(error => {
        console.error('QR preview error:', error);
        previewQR.innerHTML = '<p style="color: red;">QR kod önizleme hatası</p>';
    });
}

window.clearQRHistory = function() {
    console.log('clearQRHistory function called.');
    // The confirmation message will be handled by PHP in the index.php file
    if (!confirm(document.getElementById('confirm-clear-history-text').dataset.message)) {
        return;
    }

    fetch('clear_history.php')
        .then(response => response.json())
        .then(data => {
            console.log('Response from clear_history.php:', data);
            if (data.success) {
                // Clear the history display
                document.getElementById('qr-history').innerHTML = '';
                alert(data.message);
            } else {
                alert(data.message || 'Geçmiş silinirken bir hata oluştu.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Geçmiş silinirken bir hata oluştu.');
        });
}

// Function to delete a QR code
window.deleteQR = function(id) {
    if (confirm(document.getElementById('confirm-delete-qr-text').dataset.message)) {
        window.location.href = `delete.php?file=${id}.png`;
    }
}

// Function to load QR code history
function loadQRHistory() {
    fetch('get_history.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const historyGrid = document.getElementById('qr-history');
            if (!historyGrid) {
                console.error('QR history container not found');
                return;
            }
            
            historyGrid.innerHTML = '';
            
            if (data.length === 0) {
                historyGrid.innerHTML = '<p class="no-history">Henüz QR kod oluşturulmadı.</p>';
                return;
            }
            
            data.forEach(item => {
                const historyItem = document.createElement('div');
                historyItem.className = 'qr-history-item';
                historyItem.title = `${item.type} - ${item.date}`;
                historyItem.innerHTML = `<img src="${item.image}" alt="QR Kod" class="qr-history-image">`;
                historyItem.onclick = () => window.location.href = item.image;
                historyGrid.appendChild(historyItem);
            });
        })
        .catch(error => {
            console.error('Error loading QR history:', error);
            const historyGrid = document.getElementById('qr-history');
            if (historyGrid) {
                historyGrid.innerHTML = '<p class="error-message">QR kod geçmişi yüklenirken bir hata oluştu.</p>';
            }
        });
}

function formatQRData() {
    const format = document.getElementById('format').value;
    let data = '';

    switch(format) {
        case 'text':
        case 'url':
            const textData = document.getElementById('data');
            if (textData) {
                data = textData.value;
            }
            break;
        case 'vcard':
            const name = document.getElementById('vcard-name')?.value || '';
            const phone = document.getElementById('vcard-phone')?.value || '';
            const email = document.getElementById('vcard-email')?.value || '';
            const org = document.getElementById('vcard-org')?.value || '';
            
            data = `BEGIN:VCARD\nVERSION:3.0\nFN:${name}\n`;
            if (phone) data += `TEL:${phone}\n`;
            if (email) data += `EMAIL:${email}\n`;
            if (org) data += `ORG:${org}\n`;
            data += 'END:VCARD';
            break;
        case 'wifi':
            const ssid = document.getElementById('wifi-ssid')?.value || '';
            const password = document.getElementById('wifi-password')?.value || '';
            const type = document.getElementById('wifi-type')?.value || 'WPA';
            
            data = `WIFI:S:${ssid};T:${type};P:${password};;`;
            break;
        case 'email':
            const emailAddress = document.getElementById('email-address')?.value || '';
            const subject = document.getElementById('email-subject')?.value || '';
            const body = document.getElementById('email-body')?.value || '';
            
            data = `mailto:${emailAddress}`;
            if (subject || body) {
                data += '?';
                if (subject) data += `subject=${encodeURIComponent(subject)}`;
                if (body) {
                    if (subject) data += '&';
                    data += `body=${encodeURIComponent(body)}`;
                }
            }
            break;
    }

    return data;
}
