// Menangkap elemen gambar di dalam navbar-brand
const navbarBrandImg = document.querySelector(".navbar-brand img");

// Memantau event scroll
window.addEventListener("scroll", () => {
    // Memeriksa lebar layar
    const screenWidth = window.innerWidth;

    // Jika lebar layar adalah layar laptop (lebar layar kurang dari 992px)
    if (screenWidth >= 992) {
        // Mengambil posisi vertikal dari scroll
        const scrollPosition = window.scrollY;

        // Mengubah ukuran gambar berdasarkan posisi scroll
        if (scrollPosition > 50) {
            // Jika posisi scroll lebih dari 50px dari atas
            navbarBrandImg.style.width = "120px"; // Atur lebar gambar menjadi 70px
        } else {
            // Jika posisi scroll kembali di atas 50px
            navbarBrandImg.style.width = "140px"; // Atur kembali lebar gambar menjadi 80px
        }
    }
});

// Menangkap elemen yang akan diubah gayanya
const container = document.querySelector(".container.pading-nav");
const nav = document.querySelector("nav");
const rumah = document.querySelector(".rumah");
const warpSearch = document.querySelector(".warp-search");

// Memantau event scroll
window.addEventListener(
    "scroll",
    () => {
        // Memeriksa lebar layar
        const screenWidth = window.innerWidth;

        // Jika lebar layar adalah layar laptop (lebar layar kurang dari 992px)
        if (screenWidth >= 992) {
            // Mengambil posisi vertikal dari scroll
            const scrollPosition = window.scrollY;

            // Mengubah properti opacity nav berdasarkan posisi scroll
            if (scrollPosition > 50) {
                // Jika posisi scroll lebih dari 50px dari atas
                nav.style.opacity = "0.9";
                rumah.style.width = "450px";
                // nav.style.height = "120px"; // Atur tinggi menjadi 200px
                warpSearch.style.padding = "0.3rem 1rem"; // Atur padding menjadi 0.2rem atas-bawah dan 0.6rem kiri-kanan
            } else {
                // Jika posisi scroll kembali di atas 50px
                nav.style.opacity = "1"; // Kembalikan tingkat transparansi menjadi 1 (tidak transparan)
                rumah.style.width = "500px";
                // nav.style.height = "150px"; // Kembalikan tinggi menjadi 300px
                warpSearch.style.padding = "0.5rem 1rem"; // Atur kembali padding menjadi 0.5rem atas-bawah dan 1rem kiri-kanan
            }
        }
        if (screenWidth < 993) {
            // Mengambil posisi vertikal dari scroll
            const scrollPosition = window.scrollY;

            // Mengubah properti opacity nav berdasarkan posisi scroll
            if (scrollPosition > 50) {
                // Jika posisi scroll lebih dari 50px dari atas
                nav.style.opacity = "0.9";
            } else {
                // Jika posisi scroll kembali di atas 50px
                nav.style.opacity = "1";
            }
        }
    }
    // jika ukuran hp
);

// // Menangkap elemen gambar di dalam navbar-brand
// const navbarBrandImg = document.querySelector(".navbar-brand img");

// // Memantau event scroll
// window.addEventListener("scroll", () => {
//     // Mengambil posisi vertikal dari scroll
//     const scrollPosition = window.scrollY;

//     // Mengubah ukuran gambar berdasarkan posisi scroll
//     if (scrollPosition > 50) {
//         // Jika posisi scroll lebih dari 50px dari atas
//         navbarBrandImg.style.width = "120px"; // Atur lebar gambar menjadi 70px
//     } else {
//         // Jika posisi scroll kembali di atas 50px
//         navbarBrandImg.style.width = "140px"; // Atur kembali lebar gambar menjadi 80px
//     }
// });

// // Menangkap elemen yang akan diubah gayanya
// const container = document.querySelector(".container.pading-nav");

// const nav = document.querySelector("nav");
// const rumah = document.querySelector(".rumah");

// // Memantau event scroll
// // Menangkap elemen nav

// // Memantau event scroll
// window.addEventListener("scroll", () => {
//     // Mengambil posisi vertikal dari scroll
//     const scrollPosition = window.scrollY;

//     // Mengubah properti opacity nav berdasarkan posisi scroll
//     if (scrollPosition > 50) {
//         // Jika posisi scroll lebih dari 50px dari atas
//         nav.style.opacity = "0.9"; // Atur tingkat transparansi menjadi 0.8
//         rumah.style.width = "80%";
//         rumah.style.marginLeft = "20px";
//     } else {
//         // Jika posisi scroll kembali di atas 50px
//         nav.style.opacity = "1"; // Kembalikan tingkat transparansi menjadi 1 (tidak transparan)
//         rumah.style.marginLeft = "-40px";
//         rumah.style.width = "";
//     }
// });

// window.addEventListener("scroll", () => {
//     // Mengambil posisi vertikal dari scroll
//     const scrollPosition = window.scrollY;

//     // Mengubah tinggi nav berdasarkan posisi scroll
//     if (scrollPosition > 50) {
//         // Jika posisi scroll lebih dari 50px dari atas
//         nav.style.height = "120px"; // Atur tinggi menjadi 200px
//     } else {
//         // Jika posisi scroll kembali di atas 50px
//         nav.style.height = "150px"; // Kembalikan tinggi menjadi 300px
//     }
// });

// // Menangkap elemen dengan kelas .warp-search
// const warpSearch = document.querySelector(".warp-search");

// // Memantau event scroll
// window.addEventListener("scroll", () => {
//     // Mengambil posisi vertikal dari scroll
//     const scrollPosition = window.scrollY;

//     // Mengubah padding dari elemen warp-search berdasarkan posisi scroll
//     if (scrollPosition > 50) {
//         // Jika posisi scroll lebih dari 50px dari atas
//         warpSearch.style.padding = "0.3rem 1rem"; // Atur padding menjadi 0.2rem atas-bawah dan 0.6rem kiri-kanan
//     } else {
//         // Jika posisi scroll kembali di atas 50px
//         warpSearch.style.padding = "0.5rem 1rem"; // Atur kembali padding menjadi 0.5rem atas-bawah dan 1rem kiri-kanan
//     }
// });
