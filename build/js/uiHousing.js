import { delay } from "./uiDelay.js";
/**
 * Shows housing example images with staggered animation
 */
export async function showHousingExamples() {
    const examples = document.querySelectorAll(".eg-img");
    if (examples.length === 0) {
        console.warn("No example images found for animation");
        return;
    }
    await delay(500);
    examples.forEach((example, i) => {
        setTimeout(() => {
            example.classList.remove("hidden");
            example.classList.remove("opacity-0");
            example.style.animation = `var(--animation-slide-top)`;
        }, 200 * i);
    });
}
/**
 * Gets data or image element for a specific housing card
 * @param key - The key of the housing card
 * @param type - Either "data" for info div or "img" for image element
 * @returns The requested element or null if not found
 */
function getData(key, type = "data") {
    switch (type) {
        case "data":
            return document.querySelector(`div[data-key="img_${key}"] .housing-info`);
        case "img":
            return document.querySelector(`div[data-key="img_${key}"] img`);
        default:
            return null;
    }
}
/**
 * Gets the index of the currently active housing card
 * @param children - Array of housing card elements
 * @returns Index of current card or -1 if not found
 */
function getCurrent(children) {
    for (let i = 0; i < children.length; i++) {
        const child = children[i];
        if (child.dataset.current === "true") {
            return i;
        }
    }
    return -1;
}
/**
 * Calculates the translate X value to center the current card
 * @param children - Array of housing card elements
 * @param current - Index of current card
 * @param mover - The container element
 * @returns The translate X value in pixels
 */
function nextTranslate(children, current, mover) {
    const currentChild = children[current];
    const width = mover.parentElement?.offsetWidth || 0;
    const itemWidth = currentChild.offsetWidth;
    const itemOffset = currentChild.offsetLeft;
    return itemOffset - width / 2 + itemWidth / 2;
}
/**
 * Clones a region of child elements
 * @param children - Array of housing card elements
 * @param start - Start index
 * @param end - End index
 * @returns Array of cloned elements
 */
function cloneRegion(children, start, end) {
    return Array.from(children)
        .slice(start, end + 1)
        .map((node) => node.cloneNode(true));
}
/**
 * Randomizes housing cards with new property data
 * @param children - Array of housing card elements
 * @param mover - The container element
 * @param props - Array of property data
 * @param current - Index of current card
 * @param start - Starting index for key assignment
 */
function randomize(children, mover, props, current, start = 1) {
    const uuids = [];
    const nums = [];
    const first = start - 1;
    const middle = start;
    const last = start + 1;
    const beforeCurrent = current - 1;
    const afterCurrent = current + 1;
    const [beforeNode, currentNode, afterNode] = cloneRegion(children, beforeCurrent, afterCurrent);
    const beforeHousing = beforeNode;
    const currentHousing = currentNode;
    const afterHousing = afterNode;
    beforeHousing.dataset.key = `img_${first}`;
    currentHousing.dataset.key = `img_${middle}`;
    afterHousing.dataset.key = `img_${last}`;
    /**
     * Generates a random index that hasn't been used yet
     * @returns Random index
     */
    const genRandom = () => {
        let random = Math.floor(Math.random() * props.length);
        while (nums.includes(random)) {
            random = Math.floor(Math.random() * props.length);
        }
        return random;
    };
    // Collect all UUIDs
    for (let i = 0; i < children.length; ++i) {
        const child = children[i];
        uuids.push(child.dataset.uuid);
    }
    // Update all cards except the current region
    for (let i = 0; i < uuids.length; ++i) {
        if (i >= beforeCurrent && i <= afterCurrent) {
            continue;
        }
        const uuid = uuids[i];
        const div = document.querySelector(`[data-uuid="${uuid}"]`);
        if (!div) {
            console.warn(`Housing card with uuid ${uuid} not found`);
            continue;
        }
        const random = genRandom();
        nums.push(random);
        const image = document.querySelector(`[data-uuid="${uuid}"] img`);
        const title = document.querySelector(`[data-uuid="${uuid}"] .housing-title`);
        const description = document.querySelector(`[data-uuid="${uuid}"] .housing-title + p`);
        const location = document.querySelector(`[data-uuid="${uuid}"] .housing-location`);
        const price = document.querySelector(`[data-uuid="${uuid}"] .housing-price`);
        const bathrooms = document.querySelector(`[data-uuid="${uuid}"] .housing-bathrooms`);
        const bedrooms = document.querySelector(`[data-uuid="${uuid}"] .housing-bedrooms`);
        const propTitle = props[random].title;
        const propDescription = props[random].description;
        const propPrice = props[random].price.toString();
        const propLocation = props[random].location;
        const propBathrooms = props[random].bathrooms;
        const propBedrooms = props[random].bedrooms;
        const propSrc = props[random].src;
        const propAlt = props[random].description;
        if (title)
            title.innerHTML = propTitle;
        if (description)
            description.innerHTML = propDescription;
        if (location)
            location.innerHTML = `<span class="text-orange-400"> Lugar: </span> ${propLocation}`;
        if (price)
            price.innerHTML = `<span class="text-orange-400">Precio: </span> ${propPrice}$`;
        if (bathrooms)
            bathrooms.innerHTML = `<span class="text-orange-400">Baños: </span> ${propBathrooms}`;
        if (bedrooms)
            bedrooms.innerHTML = `<span class="text-orange-400">Habitaciones: </span> ${propBedrooms}`;
        if (image) {
            image.src = propSrc;
            image.alt = propAlt;
        }
        div.dataset.key = `img_${i}`;
        div.dataset.uuid = uuid;
        div.dataset.current = "false";
        div.dataset.src = propSrc;
        div.dataset.description = propDescription;
        div.dataset.title = propTitle;
        div.dataset.location = propLocation;
        div.dataset.price = propPrice;
        div.dataset.bathrooms = propBathrooms;
        div.dataset.bedrooms = propBedrooms;
    }
    mover.replaceChild(beforeNode, children[first]);
    mover.replaceChild(currentNode, children[middle]);
    mover.replaceChild(afterNode, children[last]);
}
/**
 * Starts the housing carousel animation
 * Automatically cycles through housing cards and randomizes content
 */
export async function startHousingCarousel() {
    const mover = document.getElementById("housing-moving");
    if (!mover) {
        console.warn("Housing moving container not found");
        return;
    }
    const propsData = mover.dataset.props;
    if (!propsData) {
        console.warn("No props data found in housing moving container");
        return;
    }
    const props = JSON.parse(propsData);
    let children = mover.children;
    let current = getCurrent(children);
    if (current === -1) {
        console.warn("No current housing card found");
        return;
    }
    const firstTranslate = nextTranslate(children, current, mover);
    mover.style.transform = `translateX(-${firstTranslate}px)`;
    /**
     * Moves to the next housing card with animation
     * @param callback - Function to execute after transition
     */
    const moveNext = (callback) => {
        const data = getData(current, "data");
        const img = getData(current, "img");
        if (data)
            data.style.display = "none";
        if (img)
            img.style.filter = "brightness(60%) blur(2px)";
        callback();
        const newData = getData(current, "data");
        const newImg = getData(current, "img");
        if (newData)
            newData.style.display = "block";
        if (newImg)
            newImg.style.filter = "brightness(115%) blur(0px) saturate(160%)";
        for (let i = 0; i < children.length; i++) {
            const child = children[i];
            child.dataset.current = (i === current).toString();
        }
        const val = nextTranslate(children, current, mover);
        mover.style.transform = `translateX(-${val}px)`;
    };
    setInterval(() => {
        moveNext(() => {
            const currentCopy = current;
            if (++current >= children.length - 1) {
                randomize(mover.children, mover, props, currentCopy, 1);
                mover.style.transform = `translateX(-${nextTranslate(children, 1, mover)}px)`;
                mover.style.transition = "none";
                children = mover.children;
                current = getCurrent(children);
                setTimeout(() => {
                    mover.style.transition = "";
                }, 50);
            }
        });
    }, 3000);
}
