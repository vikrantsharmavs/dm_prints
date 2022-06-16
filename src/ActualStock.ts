class ActualStock {
  constructor() {}
  generateDynamicInput(latNumber: any) {
    console.log(latNumber);

    if (latNumber != null) {
      (<HTMLInputElement>(
        document.getElementById("lotNumberValueActual")
      )).value = latNumber;
      document.querySelector("#image_box")!.innerHTML = "";
    }
  }

  // submitBeg() {
  //   let totalInput: NodeListOf<Element> = document.querySelectorAll(
  //     'input[name="bagCreate[]"]'
  //   );
  //   var x = 0;
  //   for (let total of totalInput as any) {
  //     if (total.value != "") {
  //       x++;
  //       total.classList.remove("is-invalid");
  //       total.style.borderColor = "#7952b3";
  //     } else {
  //       total.classList.add("is-invalid");
  //       total.style.borderColor = "red";
  //     }
  //   }
  //   if (x == totalInput.length) {
  //     var myForm = <HTMLFormElement>document.getElementById("formSubmit");
  //     myForm.submit();
  //     console.log(x, totalInput.length);
  //   } else {
  //     (<HTMLFormElement>(
  //       document.getElementById("lotNumberValue")
  //     )).classList.add("is-invalid");
  //   }
  // }
}

const Actual = new ActualStock();
