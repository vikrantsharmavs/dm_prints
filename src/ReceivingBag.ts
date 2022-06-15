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
            (<HTMLInputElement>(document.getElementById("lotNumberValue"))).value = latNumber;
            let inputCreate = "";
            if (receiveBagRecord.length > 0) {
              // Previous Database Exists Record
              for (let key in receiveBagRecord) {
                let begInch = receiveBagRecord[key].begInch;
                let keyIncrement = key + 1;
                inputCreate += `<input type='number' name='bagCreate[]' class='form-control bagInputCLass my-1' value="${begInch}" min="0" placeholder="${keyIncrement}" style="border: solid 1px #7952b3;">`;
              }
              // New Database Exists Record
              if (subtractValue > 0) {
                for (let index = 0; index <= subtractValue; index++) {
                  inputCreate += `<input type='number' name='bagCreate[]' class='form-control bagInputCLass my-1' min="0" placeholder="${index + 1}" style="border: solid 1px #7952b3;">`;
                }
              }
            } else {
              for (let index = 0; index <= countInput; index++) {
                inputCreate += `<input type='number' name='bagCreate[]' class='form-control bagInputCLass my-1' min="0" placeholder="${
                  index + 1
                }" style="border: solid 1px #7952b3;">`;
              }
            }
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
      }
    }
    if (x == totalInput.length) {
      var myForm = <HTMLFormElement>document.getElementById("formSubmit");
      myForm.submit();

      console.log(x, totalInput.length);
    } else {
      return false;
    }
  }
}

const Bag = new ReceivingBag();
