// let mahasiswa = {
//     nama: "Sadio Flash",
//     nrp: "01314234234",
//     email: "sadio@email.com"
// }
// console.log(JSON.stringify(mahasiswa));

// // menggunakan vanila JavaScript
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//         let mahasiswa = JSON.parse(this.responseText);
//         console.log(mahasiswa);
//     }
// }
// xhr.open('GET', 'coba.json', true);
// xhr.send();

// menggunakan AJAX/jQuery
$.getJSON('coba.json', function (data) {
    console.log(data);
});