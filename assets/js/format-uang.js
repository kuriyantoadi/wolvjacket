  // Fungsi untuk memformat input sebagai bilangan uang
  function formatUang(input) {
    // Menghapus karakter selain angka dan titik desimal
    let cleanedValue = input.value.replace(/[^\d.]/g, '');

    // Membagi angka menjadi bagian yang sebelum dan sesudah desimal
    let parts = cleanedValue.split('.');
    let beforeDecimal = parts[0];
    let afterDecimal = parts[1];

    // Mengatasi bagian sebelum desimal dengan menambahkan pemisah ribuan
    beforeDecimal = beforeDecimal.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

    // Menggabungkan kembali bagian sebelum dan sesudah desimal
    let formattedValue = beforeDecimal;
    if (afterDecimal !== undefined) {
      formattedValue += '.' + afterDecimal;
    }

    // Menetapkan hasil format kembali ke input
    input.value = formattedValue;
  }