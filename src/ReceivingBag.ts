class ReceivingBag {
  constructor() {}

  generateDynamicInput(url: any, latNumber: any) {
    if (latNumber != null) {
      $.ajax({
        url: url + "receiveBagData",
        method: "POST",
        data: {
          latNumber: latNumber,
        },
        success: function (result) {
          let data = JSON.parse(result);
          if (data.status == "Success") {
            let countInput = data.totalInput.begNumber;

            let receiveBagRecord = data.receivingBagData;
            let subtractValue = countInput - receiveBagRecord.length;
            (<HTMLInputElement>(
              document.getElementById("lotNumberValue")
            )).value = latNumber;
            let inputCreate = `<div class="row">`;
            if (receiveBagRecord.length > 0) {
              // Previous Database Exists Record
              for (let key in receiveBagRecord) {
                let begInch = receiveBagRecord[key].begInch;
                let keyIncrement = key + 1;
                inputCreate += `<div class="col-4">`;
                inputCreate += `<input type='number' name='bagCreate[]' class='form-control bagInputCLass my-1' value="${begInch}" min="0" placeholder="${keyIncrement}" style="border: solid 1px #7952b3;">`;
                inputCreate += `</div>`;
              }
              // New Database Exists Record
              if (subtractValue > 0) {
                for (let index = 0; index < subtractValue; index++) {
                  inputCreate += `<div class="col-4">`;
                  inputCreate += `<input type='number' name='bagCreate[]' class='form-control bagInputCLass my-1' min="0" placeholder="${
                    index + 1
                  }" style="border: solid 1px #7952b3;">`;
                  inputCreate += `</div>`;
                }
              }
            } else {
              for (let index = 0; index < countInput; index++) {
                inputCreate += `<div class="col-4">`;
                inputCreate += `<input type='number' name='bagCreate[]' class='form-control bagInputCLass my-1' min="0" placeholder="${
                  index + 1
                }" style="border: solid 1px #7952b3;">`;
                inputCreate += `</div>`;
              }
            }
            inputCreate += "</div>";
            document.querySelector("#bagModal")!.innerHTML = inputCreate;
          }
        },
      });
    }
  }

  submitBeg() {
    let totalInput: NodeListOf<Element> = document.querySelectorAll(
      'input[name="bagCreate[]"]'
    );
    var x = 0;
    for (let total of totalInput as any) {
      if (total.value != "") {
        x++;
        total.classList.remove("is-invalid");
        total.style.borderColor = "#7952b3";
      } else {
        total.classList.add("is-invalid");
        total.style.borderColor = "red";
      }
    }
    if (x == totalInput.length) {
      var myForm = <HTMLFormElement>document.getElementById("formSubmit");
      myForm.submit();
      console.log(x, totalInput.length);
    } else {
      (<HTMLFormElement>(
        document.getElementById("lotNumberValue")
      )).classList.add("is-invalid");
    }
  }
}

const Bag = new ReceivingBag();
