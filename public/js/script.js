// show nav profile
const showProfile = document.querySelector('#show-profile');
const profile = document.querySelector('#profile');

profile.addEventListener('click', function(){
      showProfile.classList.toggle('hidden');
      showToko.classList.add('hidden');
});

// buatToko
const toko = document.querySelector('#toko');
const showToko = document.querySelector('#showToko');

toko.addEventListener('click', ()=> {
      showToko.classList.toggle('hidden');
      showProfile.classList.add('hidden');
})

// checked keranjang
function checkAll() {
      const checkAllProduct = document.querySelector('#checkAllProduct');
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

// edit profile
const btnBiodata = document.querySelector('#buttonBiodata');
const btnAlamat = document.querySelector('#buttonAlamat');
const biodata = document.querySelector('#biodata');
const alamat = document.querySelector('#alamat');
const btnTambahAlamat = document.querySelector('#buttonTambahAlamat');
const formTambahAlamat = document.querySelector('#formTambahAlamat');
const detailBiodata = document.querySelector('#detailBiodata');
const formUbahBiodata = document.querySelector('#formUbahBiodata');
const btnUbahBiodata = document.querySelector('#buttonUbahBiodata');
const showAlamat = document.querySelector('#showAlamat');
const editAlamat = document.querySelector('#editAlamat');

btnBiodata.addEventListener('click',  ()=>{
      localStorage.setItem("biodata", "true");
      localStorage.removeItem("alamat");
      localStorage.removeItem("ubahBiodata");
      localStorage.removeItem("tambahAlamat");
      biodata.classList.remove('hidden');
      alamat.classList.add('hidden');
      btnBiodata.classList.add('text-blue-500');
      btnBiodata.classList.add('border-blue-500');
      btnAlamat.classList.remove('text-blue-500');
      btnAlamat.classList.remove('border-blue-500');
      formUbahBiodata.classList.add('hidden');
      detailBiodata.classList.remove('hidden');
      if(formUbahBiodata.classList.contains('hidden')) {
            btnUbahBiodata.innerHTML = "Ubah biodata";
      }else{
            btnUbahBiodata.innerHTML = "Batalkan";
      }
});

btnAlamat.addEventListener('click',  () =>{
      localStorage.setItem("alamat", "true");
      localStorage.removeItem("biodata");
      localStorage.removeItem("ubahBiodata");
      localStorage.removeItem("tambahAlamat");
      biodata.classList.add('hidden');
      alamat.classList.remove('hidden');
      btnAlamat.classList.add('text-blue-500');
      btnAlamat.classList.add('border-blue-500');
      btnBiodata.classList.remove('text-blue-500');
      btnBiodata.classList.remove('border-blue-500');
      formTambahAlamat.classList.add('hidden');
      showAlamat.classList.remove('hidden');
      if(formTambahAlamat.classList.contains('hidden')){
            btnTambahAlamat.innerHTML = "Tambah alamat";
      }else{
            btnTambahAlamat.innerHTML = "Batalkan";
      };
});

if(localStorage.getItem("alamat")){
      biodata.classList.add('hidden');
      alamat.classList.remove('hidden');
      btnAlamat.classList.add('text-blue-500');
      btnAlamat.classList.add('border-blue-500');
      btnBiodata.classList.remove('text-blue-500');
      btnBiodata.classList.remove('border-blue-500');
}

btnUbahBiodata.addEventListener('click', () =>{
      localStorage.setItem("ubahBiodata", "true");
      localStorage.removeItem("biodata");
      localStorage.removeItem("alamat");
      localStorage.removeItem("tambahAlamat");
      detailBiodata.classList.toggle('hidden');
      formUbahBiodata.classList.toggle('hidden');
      if(formUbahBiodata.classList.contains('hidden')) {
            btnUbahBiodata.innerHTML = "Ubah biodata";
      }else{
            btnUbahBiodata.innerHTML = "Batalkan";
      }
});

if(localStorage.getItem("ubahBiodata")){
      biodata.classList.remove('hidden');
      alamat.classList.add('hidden');
      detailBiodata.classList.toggle('hidden');
      formUbahBiodata.classList.toggle('hidden');
      btnAlamat.classList.remove('text-blue-500');
      btnAlamat.classList.remove('border-blue-500');
      btnBiodata.classList.add('text-blue-500');
      btnBiodata.classList.add('border-blue-500');
      btnUbahBiodata.innerHTML = "Batalkan";
}

btnTambahAlamat.addEventListener('click', () =>{
      localStorage.setItem("tambahAlamat", "true");
      localStorage.removeItem("biodata");
      localStorage.removeItem("alamat");
      localStorage.removeItem("ubahBiodata");
      formTambahAlamat.classList.toggle('hidden');
      showAlamat.classList.toggle('hidden');
      if(formTambahAlamat.classList.contains('hidden')){
            btnTambahAlamat.innerHTML = "Tambah alamat";
      }else{
            btnTambahAlamat.innerHTML = "Batalkan";
      };
});

if(localStorage.getItem("tambahAlamat")){
      biodata.classList.add('hidden');
      alamat.classList.remove('hidden');
      formTambahAlamat.classList.toggle('hidden');
      showAlamat.classList.toggle('hidden');
      btnAlamat.classList.add('text-blue-500');
      btnAlamat.classList.add('border-blue-500');
      btnBiodata.classList.remove('text-blue-500');
      btnBiodata.classList.remove('border-blue-500');
      btnTambahAlamat.innerHTML = "Batalkan";
}

editAlamat.addEventListener('click', ()=> {
      localStorage.removeItem("ubahBiodata");
      localStorage.removeItem("biodata");
      localStorage.setItem("alamat", "true");
      localStorage.removeItem("tambahAlamat");
});

// set interval session
const sessionSucces1 = document.querySelector('#sessionSucces1');
const sessionSucces2 = document.querySelector('#sessionSucces2');
setInterval(function(){
      sessionSucces1.classList.add('hidden');
      sessionSucces2.classList.add('hidden');
}, 5000);