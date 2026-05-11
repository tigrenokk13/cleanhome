const brandData = {
    1: {
        name: "Ariel",
        desc: "Ariel є визнаним лідером у сфері прання. Інноваційні формули дозволяють видаляти навіть найскладніші плями при низьких температурах, зберігаючи структуру волокон та яскравість кольору.",
        img: "../Tovar/ariel.jpg"
    },
    2: {
        name: "Fairy",
        desc: "Fairy — це синонім економічності та потужності. Одна крапля засобу здатна відмити гору посуду, розщеплюючи жир миттєво. Безпечний для шкіри рук та надзвичайно ефективний.",
        img: "../Tovar/fairy.jpg"
    },
    3: {
        name: "Domestos",
        desc: "Domestos забезпечує неперевершений рівень гігієни. Спеціально розроблені засоби знищують 99.9% відомих бактерій та вірусів, захищаючи вашу родину та забезпечуючи сяючу чистоту.",
        img: "../Tovar/domestos.jpg"
    }
};

function updateBrand(id) {
    const box = document.getElementById("tab_content_box");
    const data = brandData[id];
    
    box.style.opacity = "0";
    
    setTimeout(() => {
        box.innerHTML = `
            <img src="${data.img}" alt="${data.name}">
            <div class="brand-info">
                <h2>${data.name}</h2>
                <p>${data.desc}</p>
                <button class="tab-btn active" onclick="location.href='index.html'">Переглянути товари</button>
            </div>
        `;
        box.style.opacity = "1";
    }, 200);
}

document.addEventListener("DOMContentLoaded", () => {
    updateBrand(1);
    
    document.querySelectorAll(".tab-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
            this.classList.add("active");
            updateBrand(this.dataset.tab);
        });
    });
});