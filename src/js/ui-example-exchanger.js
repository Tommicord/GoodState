import { delay } from "./ui-delay.js";

export async function StartHousingExampleExchanger() {
  function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  const dir = "/assets/";
  const totalExamples = 6;
  const examples = document.querySelectorAll(".eg-img");
  const registeredImages = new Set([1, 2, 3]);
  const registeredExchanges = new Set([0, 1, 2]);
  const prefix = "example-";
  const ext = ".jpg";
  setInterval(async () => {
    let nImage;
    let nExchange;
    do {
      nImage = randomInt(1, totalExamples);
    } while (registeredImages.has(nImage));
    do {
      nExchange = randomInt(0, examples.length - 1);
    } while (registeredExchanges.has(nExchange));
    nImage = nImage < 0 ? 1 : Math.floor(nImage);
    nExchange = Math.floor(nExchange);
    const exampleToExchange = examples[nExchange];
    const delayTime = Math.random() * 238; // Magic number, just to make it look more natural
    await delay(delayTime);
    exampleToExchange.src = dir + prefix + nImage + ext;
    registeredImages.add(nImage);
    registeredExchanges.add(nExchange);
  }, 2600);
}