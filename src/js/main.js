const delay = ms => new Promise(resolve => setTimeout(resolve, ms));

class App {
    constructor() {
        new Promise((resolve, reject) => 
            resolve(
                this.StartHousingCarousel()
            )
        );
        this.ShowHousingExamples();
    }

    async ShowHousingExamples() {
        const examples = document.querySelectorAll(".eg-img");

        await delay(500);

        examples.forEach((example, i) => {
            setTimeout(() => {
                example.classList.remove("hidden")
                example.classList.remove("opacity-0")
                example.style.animation = `var(--animation-slide-top)`;
            }, 200 * i);
        });
    }

    async StartHousingCarousel() {
        function getData(key, type = "data") {
            switch(type) {
                case "data":
                    return document.querySelector(`div[data-key="img_${key}"] .housing-info`);
                case "img":
                    return document.querySelector(`div[data-key="img_${key}"] img`);
            }
        }

        function getCurrent(children) {
            for(let i = 0; i < children.length; i++) {
                const child = children[ i ];
                if(child.dataset["current"] === "true") {
                    return i;
                }
            }
        }
        
        function nextTranslate(children, current, mover) {
            const currentChild = children[current];
            const width = mover.parentElement.offsetWidth;
            const itemWidth = currentChild.offsetWidth;
            const itemOffset = currentChild.offsetLeft;
            return itemOffset - (width / 2) + (itemWidth / 2);
        }
    
        const mover = document.getElementById("housing-moving");
        const children = mover.children;
        let current = getCurrent(children);
        const firstTranslate = nextTranslate(children, current, mover);
        mover.style.transform = `translateX(-${firstTranslate}px)`;
        for(let i = 0; i < mover.children.length; i++) {
            const child = children[ i ];
            if(child.dataset["current"] === "true") {
                current = i;
                break;
            }
        }

        setInterval(() => {
            let data = getData(current, "data");
            let img = getData(current, "img");
            data.style.display = "none"; // Hide the data for the current image
            img.style.filter = "brightness(60%) blur(2px)";

            current = (current + 1) % children.length;
            let newData = getData(current, "data");
            let newImg = getData(current, "img");
            newData.style.display = "block"; // Show the data for the current image
            newImg.style.filter = "brightness(108%) blur(0px)";

            for(let i = 0; i < children.length; i++) {
                children[ i ].dataset["current"] = (i === current).toString();
            }
            const val = nextTranslate(children, current, mover);
            console.log(val);
            mover.style.transform = `translateX(-${val}px)`;
        }, 3000);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    new App();
});