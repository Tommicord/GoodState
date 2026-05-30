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
    exampleToExchange.src = dir + "example-" + Math.ceil(Math.random() * 4) + ".jpg";
  }, 4300);
}