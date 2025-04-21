// document.addEventListener("DOMContentLoaded", function () {
//     // Menambahkan event listener untuk menutup popup saat mengklik di luar area gambar
//     var popup = document.getElementById("popup");
//     window.onclick = function (event) {
//         if (event.target == popup) {
//             closePopup();
//         }
//     };
// });

// function openPopup(imgSrc, desc) {
//     document.getElementById("popupImg").src = imgSrc;
//     document.getElementById("popup").style.display = "block";
//     document.getElementById("popupDesc").textContent = desc;
// }

// function closePopup() {
//     document.getElementById("popup").style.display = "none";
// }

// OpenPopup and ClosePopup functions
document.addEventListener("DOMContentLoaded", function () {
    var popup = document.getElementById("popup");
    window.onclick = function (event) {
        if (event.target == popup) {
            closePopup();
        }
    };
});

function openPopup(imgSrc, desc) {
    document.getElementById("popupImg").src = imgSrc;
    document.getElementById("popup").style.display = "block";
    document.getElementById("popupDesc").textContent = desc;
}

function closePopup() {
    document.getElementById("popup").style.display = "none";
}

// document.addEventListener("DOMContentLoaded", function () {
//     const ele = document.querySelector(".slider-event");
//     ele.style.cursor = "grab";

//     let pos = { top: 0, left: 0, x: 0, y: 0 };

//     const mouseDownHandler = function (e) {
//         ele.style.cursor = "grabbing";
//         ele.style.userSelect = "none";

//         pos = {
//             left: ele.scrollLeft,
//             top: ele.scrollTop,
//             // Get the current mouse position
//             x: e.clientX,
//             y: e.clientY,
//         };

//         document.addEventListener("mousemove", mouseMoveHandler);
//         document.addEventListener("mouseup", mouseUpHandler);
//     };

//     const mouseMoveHandler = function (e) {
//         // How far the mouse has been moved
//         const dx = e.clientX - pos.x;
//         const dy = e.clientY - pos.y;

//         // Scroll the element
//         ele.scrollTop = pos.top - dy;
//         ele.scrollLeft = pos.left - dx;
//     };

//     const mouseUpHandler = function () {
//         ele.style.cursor = "grab";
//         ele.style.removeProperty("user-select");

//         document.removeEventListener("mousemove", mouseMoveHandler);
//         document.removeEventListener("mouseup", mouseUpHandler);
//     };

//     // Attach the handler
//     ele.addEventListener("mousedown", mouseDownHandler);
// });
// document.addEventListener("DOMContentLoaded", function () {
//     const ele = document.querySelector(".slider-promo");
//     ele.style.cursor = "grab";

//     let pos = { top: 0, left: 0, x: 0, y: 0 };

//     const mouseDownHandler = function (e) {
//         ele.style.cursor = "grabbing";
//         ele.style.userSelect = "none";

//         pos = {
//             left: ele.scrollLeft,
//             top: ele.scrollTop,
//             // Get the current mouse position
//             x: e.clientX,
//             y: e.clientY,
//         };

//         document.addEventListener("mousemove", mouseMoveHandler);
//         document.addEventListener("mouseup", mouseUpHandler);
//     };

//     const mouseMoveHandler = function (e) {
//         // How far the mouse has been moved
//         const dx = e.clientX - pos.x;
//         const dy = e.clientY - pos.y;

//         // Scroll the element
//         ele.scrollTop = pos.top - dy;
//         ele.scrollLeft = pos.left - dx;
//     };

//     const mouseUpHandler = function () {
//         ele.style.cursor = "grab";
//         ele.style.removeProperty("user-select");

//         document.removeEventListener("mousemove", mouseMoveHandler);
//         document.removeEventListener("mouseup", mouseUpHandler);
//     };

//     // Attach the handler
//     ele.addEventListener("mousedown", mouseDownHandler);
// });

document.addEventListener("DOMContentLoaded", function () {
    const ele = document.querySelector(".slider-event");
    ele.style.cursor = "grab";

    let pos = { top: 0, left: 0, x: 0, y: 0 };
    let isDragging = false;

    const mouseDownHandler = function (e) {
        isDragging = false; // Reset the dragging status
        ele.style.cursor = "grabbing";
        ele.style.userSelect = "none";

        pos = {
            left: ele.scrollLeft,
            top: ele.scrollTop,
            x: e.clientX,
            y: e.clientY,
        };

        document.addEventListener("mousemove", mouseMoveHandler);
        document.addEventListener("mouseup", mouseUpHandler);
    };

    const mouseMoveHandler = function (e) {
        isDragging = true; // Set dragging status to true
        const dx = e.clientX - pos.x;
        const dy = e.clientY - pos.y;

        ele.scrollTop = pos.top - dy;
        ele.scrollLeft = pos.left - dx;
    };

    const mouseUpHandler = function () {
        ele.style.cursor = "grab";
        ele.style.removeProperty("user-select");

        document.removeEventListener("mousemove", mouseMoveHandler);
        document.removeEventListener("mouseup", mouseUpHandler);
    };

    ele.addEventListener("mousedown", mouseDownHandler);

    // Prevent onclick if dragging
    ele.addEventListener(
        "click",
        function (e) {
            if (isDragging) {
                e.stopPropagation();
                e.preventDefault();
            }
        },
        true
    );
});

document.addEventListener("DOMContentLoaded", function () {
    const ele = document.querySelector(".slider-promo");
    ele.style.cursor = "grab";

    let pos = { top: 0, left: 0, x: 0, y: 0 };
    let isDragging = false;

    const mouseDownHandler = function (e) {
        isDragging = false; // Reset the dragging status
        ele.style.cursor = "grabbing";
        ele.style.userSelect = "none";

        pos = {
            left: ele.scrollLeft,
            top: ele.scrollTop,
            x: e.clientX,
            y: e.clientY,
        };

        document.addEventListener("mousemove", mouseMoveHandler);
        document.addEventListener("mouseup", mouseUpHandler);
    };

    const mouseMoveHandler = function (e) {
        isDragging = true; // Set dragging status to true
        const dx = e.clientX - pos.x;
        const dy = e.clientY - pos.y;

        ele.scrollTop = pos.top - dy;
        ele.scrollLeft = pos.left - dx;
    };

    const mouseUpHandler = function () {
        ele.style.cursor = "grab";
        ele.style.removeProperty("user-select");

        document.removeEventListener("mousemove", mouseMoveHandler);
        document.removeEventListener("mouseup", mouseUpHandler);
    };

    ele.addEventListener("mousedown", mouseDownHandler);

    // Prevent onclick if dragging
    ele.addEventListener(
        "click",
        function (e) {
            if (isDragging) {
                e.stopPropagation();
                e.preventDefault();
            }
        },
        true
    );

    // Functionality for .wrap-choose-tenant
    const tenantSlider = document.querySelector(".wrap-choose-tenant");
    tenantSlider.style.cursor = "grab";

    let posTenant = { top: 0, left: 0, x: 0, y: 0 };
    let isDraggingTenant = false;

    const mouseDownHandlerTenant = function (e) {
        isDraggingTenant = false;
        tenantSlider.style.cursor = "grabbing";
        tenantSlider.style.userSelect = "none";

        posTenant = {
            left: tenantSlider.scrollLeft,
            top: tenantSlider.scrollTop,
            x: e.clientX,
            y: e.clientY,
        };

        document.addEventListener("mousemove", mouseMoveHandlerTenant);
        document.addEventListener("mouseup", mouseUpHandlerTenant);
    };

    const mouseMoveHandlerTenant = function (e) {
        isDraggingTenant = true;
        const dx = e.clientX - posTenant.x;
        const dy = e.clientY - posTenant.y;

        tenantSlider.scrollTop = posTenant.top - dy;
        tenantSlider.scrollLeft = posTenant.left - dx;
    };

    const mouseUpHandlerTenant = function () {
        tenantSlider.style.cursor = "grab";
        tenantSlider.style.removeProperty("user-select");

        document.removeEventListener("mousemove", mouseMoveHandlerTenant);
        document.removeEventListener("mouseup", mouseUpHandlerTenant);
    };

    tenantSlider.addEventListener("mousedown", mouseDownHandlerTenant);

    // Prevent onclick if dragging
    tenantSlider.addEventListener(
        "click",
        function (e) {
            if (isDraggingTenant) {
                e.stopPropagation();
                e.preventDefault();
            }
        },
        true
    );
});

// document.addEventListener("DOMContentLoaded", function () {
//     const slider = document.querySelector(".wrap-choose-tenant");
//     let isDown = false;
//     let startX;
//     let scrollLeft;
//     let isDragging = false;
//     const clickThreshold = 5;

//     slider.addEventListener("mousedown", (e) => {
//         isDown = true;
//         isDragging = false;
//         slider.classList.add("active");
//         startX = e.pageX - slider.offsetLeft;
//         scrollLeft = slider.scrollLeft;
//     });

//     slider.addEventListener("mouseleave", () => {
//         isDown = false;
//         slider.classList.remove("active");
//     });

//     slider.addEventListener("mouseup", (e) => {
//         isDown = false;
//         slider.classList.remove("active");
//         if (isDragging) {
//             e.preventDefault();
//         }
//     });

//     slider.addEventListener("mousemove", (e) => {
//         if (!isDown) return;
//         e.preventDefault();
//         const x = e.pageX - slider.offsetLeft;
//         const walk = (x - startX) * 3; // scroll-fast
//         if (Math.abs(walk) > clickThreshold) {
//             isDragging = true;
//         }
//         slider.scrollLeft = scrollLeft - walk;
//         console.log("tes");
//     });

//     const links = slider.querySelectorAll("a");
//     links.forEach((link) => {
//         link.addEventListener("click", (e) => {
//             if (isDragging) {
//                 e.preventDefault();
//             }
//         });
//     });
// });
