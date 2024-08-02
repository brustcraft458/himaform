

// Edit Text
console.log("hello")
document.querySelectorAll(".edit-text").forEach(element => {
    elementEditText(element);
})

function elementEditText(element) {
    element.setAttribute("contenteditable", "true")
    element.setAttribute("spellcheck", "false")

    element.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    })
}


// Form Action
document.querySelectorAll(".form-data-template").forEach(element => {
    const fname = element.getAttribute('id')
    const childItem = element.querySelector(`#${fname}-section`)
    const btnAddItem = element.querySelector(`#${fname}-button-add`)
    console.log(fname)

    if (btnAddItem) {
        btnAddItem.addEventListener("click", () => {
            elementFormAddItem(childItem, fname)
        })
    }

    if (childItem) {
        Array.from(childItem.children).forEach(elem2 => {
            elementFormItem(elem2);
        });
    }
})

function elementFormAddItem(parrent, fname) {
    const newElm = document.createElement("div")
    const uuid = generateUUID()
    const uname = `${fname}-${uuid}`

    newElm.classList.add('form-group')
    newElm.classList.add('my-2')
    newElm.classList.add('d-flex')
    newElm.classList.add('flex-column')
    newElm.setAttribute('id', uname)

    newElm.innerHTML = `
        <div class="align-self-center p-2 shadow-sm rounded mt-4 d-none" id="${uname}-image">
            <img src="assets/img/qristes.png" alt="">
        </div>
        <div class="d-flex flex-row gap-1">
            <label class="col-form-label edit-text rounded" id="${uname}-label" name="none">Text:</label>
            <i class="bi bi-pencil-fill mt-1 fs-13px"></i>
        </div>
        <div class="d-flex flex-row gap-2">
            <input type="text" class="form-control" id="${uname}-input" value="Hello World" disabled>
            <select class="form-control w-50" id="${uname}-type" name="none">
                <option value="string">String</option>
                <option value="number">Number</option>
                <option value="file">File</option>
                <option value="payment">Payment</option>
            </select>
            <button type="button" class="btn btn-outline-danger" id="${uname}-delete"><i class="bi bi-trash"></i></button>
        </div>
    `

    // Assign
    const editText = newElm.querySelector(".edit-text")
    elementEditText(editText)
    elementFormItem(newElm)

    parrent.appendChild(newElm)
}

function elementFormItem(element) {
    const iname = element.getAttribute('id')
    const elmLabel = element.querySelector(`#${iname}-label`)
    const elmImage = element.querySelector(`#${iname}-image`)
    const elmInput = element.querySelector(`#${iname}-input`)
    const elmType = element.querySelector(`#${iname}-type`)
    const btnDelete = element.querySelector(`#${iname}-delete`)

    // First
    elmType.name = `form_data_${elmLabel.innerText}`

    // Action
    elmType.addEventListener('change', function(event) {
        const selected = event.target.value;

        // Option
        if (selected === 'string') {
            elmInput.type = "text"
            elmInput.value = "Hello Word"
        } else if (selected === 'number') {
            elmInput.type = "number"
            elmInput.value = '1234456789'
        } else if (selected === 'file' || selected == 'payment') {
            elmInput.type = "file"
        }

        if (selected == 'payment') {
            elmImage.classList.remove('d-none')
        } else {
            elmImage.classList.add('d-none')
        }
    })

    btnDelete.addEventListener('click', () => {
        element.innerHTML = ''
        element.remove()
    })

    elmLabel.addEventListener('input', () => {
        elmType.name = `form_data_${elmLabel.innerText}`
    })
}

function generateUUID() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0,
            v = c === 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
