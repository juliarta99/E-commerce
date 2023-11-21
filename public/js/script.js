// // show nav profile
function showProfile() {
      const showProfile = document.getElementById('show-profile');
      const showToko = document.getElementById('showToko');
      showProfile.classList.toggle('hidden');
      showToko.classList.add('hidden');
}

// buatToko
function showToko() {
      const showProfile = document.getElementById('show-profile');
      const showToko = document.getElementById('showToko');
      showToko.classList.toggle('hidden');
      showProfile.classList.add('hidden');
}

// checked keranjang
function checkAll() {
      const checkAllProduct = document.getElementById('checkAllProduct');
      const checkProduct = document.querySelectorAll('.checkProduct');

      if (checkAllProduct.checked){
            for (let i = 0; i < checkProduct.length; i++) {
                  checkProduct[i].checked = true;
            }
      } else {
            for ( let i = 0; i < checkProduct.length; i++) {
                  checkProduct[i].checked = false;
            }
      }

}

function setActionKeranjang(url, method)
{
      const _method = document.getElementsByName('_method')[0];
      const form = document.getElementById('formKeranjang');
      _method.value = method;
      form.action = url;
      form.submit();
}

function formatToCurrency(number) {
      const formated = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }).format(number);

      return formated.replace(/,00$/, '');
}

function kuantitasIncrement(id, harga, max) {
    // kuantitas beli
      const kuantitas = document.getElementById('kuantitas' + id);
      const totalHarga = document.getElementById('totalHarga' + id);
      if(kuantitas.value < max) {
            kuantitas.value = parseInt(kuantitas.value) + 1;
            total = parseInt(kuantitas.value) * parseInt(harga);
            totalHarga.innerHTML = formatToCurrency(total);
      } else {
            alert("Stok hanya tersedia " + max + "!");
      }
};

function kuantitasDecrement(id, harga) {
    // kuantitas beli
      const kuantitas = document.getElementById('kuantitas' + id);
      const totalHarga = document.getElementById('totalHarga' + id);
      if(kuantitas.value > 1) {
            kuantitas.value = parseInt(kuantitas.value) - 1;
            total = parseInt(kuantitas.value) * parseInt(harga);
            totalHarga.innerHTML = formatToCurrency(total);
      }
};


// dashboard
function showSidebar() {
      const humbergerBar = document.getElementById('humberger-bar');
      const humbergerX = document.getElementById('humberger-x');
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.remove('hidden');
      humbergerBar.classList.add('hidden');
      humbergerX.classList.remove('hidden');
}
function hideSidebar() {
      const humbergerBar = document.getElementById('humberger-bar');
      const humbergerX = document.getElementById('humberger-x');
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.add('hidden');
      humbergerBar.classList.remove('hidden');
      humbergerX.classList.add('hidden');
}
function showModal() {
      const modal = document.getElementById('modal');
      modal.classList.remove('hidden')
}
function closeModal() {
      const modal = document.getElementById('modal');
      modal.classList.add('hidden')
}

// // edit profile
// const btnBiodata = document.getElementById('buttonBiodata');
// const btnAlamat = document.getElementById('buttonAlamat');
// const biodata = document.getElementById('biodata');
// const alamat = document.getElementById('alamat');
// const btnTambahAlamat = document.getElementById('buttonTambahAlamat');
// const formTambahAlamat = document.getElementById('formTambahAlamat');
// const detailBiodata = document.getElementById('detailBiodata');
// const formUbahBiodata = document.getElementById('formUbahBiodata');
// const btnUbahBiodata = document.getElementById('buttonUbahBiodata');
// const showAlamat = document.getElementById('showAlamat');
// const editAlamat = document.getElementById('editAlamat');

// function showMyBiodata() {
//       localStorage.setItem("biodata", "true");
//       localStorage.removeItem("alamat");
//       localStorage.removeItem("ubahBiodata");
//       localStorage.removeItem("tambahAlamat");
//       biodata.classList.remove('hidden');
//       alamat.classList.add('hidden');
//       btnBiodata.classList.add('text-blue-500');
//       btnBiodata.classList.add('border-blue-500');
//       btnAlamat.classList.remove('text-blue-500');
//       btnAlamat.classList.remove('border-blue-500');
//       formUbahBiodata.classList.add('hidden');
//       detailBiodata.classList.remove('hidden');
//       if(formUbahBiodata.classList.contains('hidden')) {
//             btnUbahBiodata.innerHTML = "Ubah biodata";
//       }else{
//             btnUbahBiodata.innerHTML = "Batalkan";
//       }
// };

// function showMyAlamat() {
//       localStorage.setItem("alamat", "true");
//       localStorage.removeItem("biodata");
//       localStorage.removeItem("ubahBiodata");
//       localStorage.removeItem("tambahAlamat");
//       biodata.classList.add('hidden');
//       alamat.classList.remove('hidden');
//       btnAlamat.classList.add('text-blue-500');
//       btnAlamat.classList.add('border-blue-500');
//       btnBiodata.classList.remove('text-blue-500');
//       btnBiodata.classList.remove('border-blue-500');
//       formTambahAlamat.classList.add('hidden');
//       showAlamat.classList.remove('hidden');
//       if(formTambahAlamat.classList.contains('hidden')){
//             btnTambahAlamat.innerHTML = "Tambah alamat";
//       }else{
//             btnTambahAlamat.innerHTML = "Batalkan";
//       };
// };

// if(localStorage.getItem("alamat")){
//       biodata.classList.add('hidden');
//       alamat.classList.remove('hidden');
//       btnAlamat.classList.add('text-blue-500');
//       btnAlamat.classList.add('border-blue-500');
//       btnBiodata.classList.remove('text-blue-500');
//       btnBiodata.classList.remove('border-blue-500');
// }

// function showUbahMyBiodata() {
//       localStorage.setItem("ubahBiodata", "true");
//       localStorage.removeItem("biodata");
//       localStorage.removeItem("alamat");
//       localStorage.removeItem("tambahAlamat");
//       detailBiodata.classList.toggle('hidden');
//       formUbahBiodata.classList.toggle('hidden');
//       if(formUbahBiodata.classList.contains('hidden')) {
//             btnUbahBiodata.innerHTML = "Ubah biodata";
//       }else{
//             btnUbahBiodata.innerHTML = "Batalkan";
//       }
// };

// if(localStorage.getItem("ubahBiodata")){
//       biodata.classList.remove('hidden');
//       alamat.classList.add('hidden');
//       detailBiodata.classList.toggle('hidden');
//       formUbahBiodata.classList.toggle('hidden');
//       btnAlamat.classList.remove('text-blue-500');
//       btnAlamat.classList.remove('border-blue-500');
//       btnBiodata.classList.add('text-blue-500');
//       btnBiodata.classList.add('border-blue-500');
//       btnUbahBiodata.innerHTML = "Batalkan";
// }

// function showTambahMyAlamat() {
//       localStorage.setItem("tambahAlamat", "true");
//       localStorage.removeItem("biodata");
//       localStorage.removeItem("alamat");
//       localStorage.removeItem("ubahBiodata");
//       formTambahAlamat.classList.toggle('hidden');
//       showAlamat.classList.toggle('hidden');
//       if(formTambahAlamat.classList.contains('hidden')){
//             btnTambahAlamat.innerHTML = "Tambah alamat";
//       }else{
//             btnTambahAlamat.innerHTML = "Batalkan";
//       };
// };

// if(localStorage.getItem("tambahAlamat")){
//       biodata.classList.add('hidden');
//       alamat.classList.remove('hidden');
//       formTambahAlamat.classList.toggle('hidden');
//       showAlamat.classList.toggle('hidden');
//       btnAlamat.classList.add('text-blue-500');
//       btnAlamat.classList.add('border-blue-500');
//       btnBiodata.classList.remove('text-blue-500');
//       btnBiodata.classList.remove('border-blue-500');
//       btnTambahAlamat.innerHTML = "Batalkan";
// }

// function klikBtnUbahAlamat() {
//       localStorage.removeItem("ubahBiodata");
//       localStorage.removeItem("biodata");
//       localStorage.removeItem("alamat");
//       localStorage.removeItem("tambahAlamat");
// };

// // // set interval session
// // setInterval(function(){
// //     const sessionSucces1 = document.getElementById('sessionSucces1');
// //     const sessionSucces2 = document.getElementById('sessionSucces2');
// //       sessionSucces1.classList.add('hidden');
// //       sessionSucces2.classList.add('hidden');
// // }, 5000);
