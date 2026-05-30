import { delay } from "./ui-delay.js";

export async function ShowHousingExamples() {
  const examples = document.querySelectorAll(".eg-img");

  await delay(500);

  examples.forEach((example, i) => {
    setTimeout(() => {
      example.classList.remove("hidden");
      example.classList.remove("opacity-0");
      example.style.animation = `var(--animation-slide-top)`;
    }, 200 * i);
  });
}

export async function StartHousingCarousel() {
  function getData(key, type = "data") {
    switch (type) {
      case "data":
        return document.querySelector(
          `div[data-key="img_${key}"] .housing-info`,
        );
      case "img":
        return document.querySelector(`div[data-key="img_${key}"] img`);
    }
  }

  function getCurrent(children) {
    for (let i = 0; i < children.length; i++) {
      const child = children[i];
      if (child.dataset["current"] === "true") {
        return i;
      }
    }
  }

  function nextTranslate(children, current, mover) {
    const currentChild = children[current];
    const width = mover.parentElement.offsetWidth;
    const itemWidth = currentChild.offsetWidth;
    const itemOffset = currentChild.offsetLeft;
    return itemOffset - width / 2 + itemWidth / 2;
  }

  function cloneRegion(children, start, end) {
    return Array.from(children)
      .slice(start, end + 1)
      .map((node) => node.cloneNode(true));
  }

  function randomize(children, mover, props, current, start = 1) {
    let uuids = [];
    let nums = [];
    const first = start - 1;
    const middle = start;
    const last = start + 1;
    const beforeCurrent = current - 1;
    const afterCurrent = current + 1;
    const [beforeNode, currentNode, afterNode] = cloneRegion(
      children,
      beforeCurrent,
      afterCurrent,
    );
    beforeNode.dataset["key"] = `img_${first}`;
    currentNode.dataset["key"] = `img_${middle}`;
    afterNode.dataset["key"] = `img_${last}`;

    const genRandom = () => {
      let random = Math.floor(Math.random() * props.length);

      while (nums.includes(random)) {
        random = Math.floor(Math.random() * props.length);
      }

      return random;
    };
    for (let i = 0; i < children.length; ++i) {
      uuids.push(children[i].dataset["uuid"]);
    }
    for (let i = 0; i < uuids.length; ++i) {
      if (i >= beforeCurrent && i <= afterCurrent) {
        continue;
      }
      const uuid = uuids[i];
      const div = document.querySelector(`[data-uuid="${uuid}"]`);
      const random = genRandom();
      nums.push(random);
      const image = document.querySelector(`[data-uuid="${uuid}"] img`);
      const title = document.querySelector(
        `[data-uuid="${uuid}"] .housing-title`,
      );
      const description = document.querySelector(
        `[data-uuid="${uuid}"] .housing-title + p`,
      );
      const location = document.querySelector(
        `[data-uuid="${uuid}"] .housing-location`,
      );
      const price = document.querySelector(
        `[data-uuid="${uuid}"] .housing-price`,
      );
      const bathrooms = document.querySelector(
        `[data-uuid="${uuid}"] .housing-bathrooms`,
      );
      const bedrooms = document.querySelector(
        `[data-uuid="${uuid}"] .housing-bedrooms`,
      );
      const propTitle = props[random].title;
      const propDescription = props[random].description;
      const propPrice = props[random].price.toString();
      const propLocation = props[random].location;
      const propBathrooms = props[random].bathrooms;
      const propBedrooms = props[random].bedrooms;
      const propSrc = props[random].src;
      const propAlt = props[random].description;
      title.innerHTML = propTitle;
      description.innerHTML = propDescription;
      location.innerHTML = `<span class="text-orange-400"> Lugar: </span> ${propLocation}`;
      price.innerHTML = `<span class="text-orange-400">Precio: </span> ${propPrice}$`;
      bathrooms.innerHTML = `<span class="text-orange-400">Baños: </span> ${propBathrooms}`;
      bedrooms.innerHTML = `<span class="text-orange-400">Habitaciones: </span> ${propBedrooms}`;
      image.src = propSrc;
      image.alt = propAlt;

      div.dataset["key"] = `img_${i}`;
      div.dataset["uuid"] = uuid;
      div.dataset["current"] = "false";
      div.dataset["src"] = propSrc;
      div.dataset["description"] = propDescription;
      div.dataset["title"] = propTitle;
      div.dataset["location"] = propLocation;
      div.dataset["price"] = propPrice;
      div.dataset["bathrooms"] = propBathrooms;
      div.dataset["bedrooms"] = propBedrooms;
    }

    mover.replaceChild(beforeNode, children[first]);
    mover.replaceChild(currentNode, children[middle]);
    mover.replaceChild(afterNode, children[last]);
  }

  const mover = document.getElementById("housing-moving");
  const props = JSON.parse(mover.dataset["props"]); // All data is stored in the data-props attribute
  let children = mover.children;
  let current = getCurrent(children);
  const firstTranslate = nextTranslate(children, current, mover);
  mover.style.transform = `translateX(-${firstTranslate}px)`;

  const moveNext = (callback) => {
    let data = getData(current, "data");
    let img = getData(current, "img");
    data.style.display = "none"; // Hide the data for the current image
    img.style.filter = "brightness(60%) blur(2px)";
    callback();
    let newData = getData(current, "data");
    let newImg = getData(current, "img");
    newData.style.display = "block"; // Show the data for the current image
    newImg.style.filter = "brightness(115%) blur(0px) saturate(160%)";

    for (let i = 0; i < children.length; i++) {
      children[i].dataset["current"] = (i === current).toString();
    }
    const val = nextTranslate(children, current, mover);
    mover.style.transform = `translateX(-${val}px)`;
  };

  setInterval(() => {
    moveNext(() => {
      const currentCopy = current.valueOf();

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