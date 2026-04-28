function toggleMethod(type) {
    document.getElementById('section-wallet').classList.toggle('hidden', type !== 'wallet');
    document.getElementById('section-promptpay').classList.toggle('hidden', type !== 'promptpay');
}

document.getElementById('submitWalletBtn').addEventListener('click', async function () {
    const link = document.getElementById('voucherInput').value.trim();
    if (!link) return Swal.fire('แจ้งเตือน', 'กรุณากรอกลิงก์ซองของขวัญ', 'warning');

    Swal.fire('กำลังประมวลผล', 'ระบบกำลังตรวจสอบซองของขวัญ...', 'info');
});

document.getElementById('submitSlipBtn').addEventListener('click', async function () {
    const fileInput = document.getElementById('slipInput');
    if (fileInput.files.length === 0) return Swal.fire('แจ้งเตือน', 'กรุณาเลือกไฟล์สลิปก่อนครับ',
        'warning');

    const formData = new FormData();
    formData.append('slip', fileInput.files[0]);

    Swal.fire({
        title: 'กำลังตรวจสอบสลิป...',
        text: 'โปรดรอสักครู่ ระบบกำลังยืนยันยอดเงิน',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });

});