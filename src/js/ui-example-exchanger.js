import { delay } from "./ui-delay.js";

export async function StartHousingExampleExchanger() {
  setInterval(async () => {
    const examples = document.querySelectorAll(".eg-img");
    let n = Math.random() * examples.length;
    while (n === 0) {
      n = Math.random() * examples.length;
    }
    const exampleToExchange = examples[Math.floor(n)];
    const dir = "/assets/"
    const delay = Math.random() * 238; // Magic number, just to make it look more natural
    await delay(delay);
    exampleToExchange.src = dir + "example-" + Math.ceil(Math.random() * 4) + ".jpg";
  }, 2300);
}