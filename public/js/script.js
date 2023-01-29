// show nav profile
const showProfile = document.getElementById('show-profile');
const profile = document.getElementById('profile');

profile.addEventListener('click', function(){
      showProfile.classList.toggle('hidden');
      showToko.classList.add('hidden');
});

// buatToko
const toko = document.getElementById('toko');
const showToko = document.getElementById('showToko');

toko.addEventListener('click', ()=> {
      showToko.classList.toggle('hidden');
      showProfile.classList.add('hidden');
})


// edit profile
const btnBiodata = document.getElementById('buttonBiodata');
const btnAlamat = document.getElementById('buttonAlamat');
const biodata = document.getElementById('biodata');
const alamat = document.getElementById('alamat');
const btnTambahAlamat = document.getElementById('buttonTambahAlamat');
const formTambahAlamat = document.getElementById('formTambahAlamat');
const detailBiodata = document.getElementById('detailBiodata');
const formUbahBiodata = document.getElementById('formUbahBiodata');
const btnUbahBiodata = document.getElementById('buttonUbahBiodata');
const showAlamat = document.getElementById('showAlamat');

btnBiodata.addEventListener('click',  () =>{
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
      localStorage.removeItem("tamabahAlamat");
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

// set interval session
const sessionSucces1 = document.getElementById('sessionSucces1');
const sessionSucces2 = document.getElementById('sessionSucces2');
setInterval(function(){
      sessionSucces1.classList.add('hidden');
      sessionSucces2.classList.add('hidden');
}, 5000);