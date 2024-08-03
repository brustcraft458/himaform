// Global
var globalCounter = 0

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
    const btnSubmit = element.querySelector(`#${fname}-button-submit`)

    if (!btnAddItem || !childItem || !btnSubmit) {
        return
    }

    // Add Item
    btnAddItem.addEventListener("click", () => {
        elementFormAddItem(childItem, fname)
    })

    // Item Children
    Array.from(childItem.children).forEach(elem2 => {
        elementFormItem(elem2);
    });

    // Submit Form
    btnSubmit.addEventListener('click', () => {
        elementFormSubmit(element, childItem, fname)
    })
})

function elementFormAddItem(parrent, fname) {
    const newElm = document.createElement("div")
    const inum = generateIncrementNumber()
    const uname = `${fname}-${inum}`

    newElm.classList.add('form-group')
    newElm.classList.add('my-2')
    newElm.classList.add('d-flex')
    newElm.classList.add('flex-column')
    newElm.setAttribute('id', uname)

    newElm.innerHTML = `
        <div class="form-group my-2 d-flex flex-column" id="${uname}">
            <div class="align-self-center p-2 shadow-sm rounded mt-4 d-none" id="${uname}-image">
            </div>
            <div class="d-flex flex-row gap-1">
                <label class="col-form-label edit-text rounded" id="${uname}-label">Text 1:</label>
                <i class="bi bi-pencil-fill mt-1 fs-13px"></i>
            </div>
            <div class="d-flex flex-row gap-2">
                <input type="text" class="form-control" id="${uname}-input" value="Hello World" disabled>
                <select class="form-control w-50" id="${uname}-type">
                    <option value="string">String</option>
                    <option value="number">Number</option>
                    <option value="file">File</option>
                    <option value="payment">Payment</option>
                </select>
                <button type="button" class="btn btn-outline-danger" id="${uname}-delete"><i class="bi bi-trash"></i></button>
            </div>
        </div>
    `

    // Assign
    const editText = newElm.querySelector(".edit-text")
    elementEditText(editText)
    elementFormItem(newElm)

    parrent.appendChild(newElm)
}

function elementFormSubmit(root, parrent, fname) {
    const elmTitle = root.querySelector(`#${fname}-title`)
    const elmForm = root.querySelector('form')

    let jsonData = {
        title: elmTitle.innerText,
        section_list: []
    }

    // Get Data Children
    Array.from(parrent.children).forEach(element => {
        const uname = element.getAttribute('id')
        const elmLabel = element.querySelector(`#${uname}-label`)
        const elmImage = element.querySelector(`#${uname}-image`)
        const elmInput = element.querySelector(`#${uname}-input`)
        const elmType = element.querySelector(`#${uname}-type`)
        const btnDelete = element.querySelector(`#${uname}-delete`)

        let newData = {
            label: elmLabel.innerText,
            type: elmType.value
        }

        const inpImage = elmImage.querySelector("input")
        if (inpImage) {
            newData['image'] = inpImage.name
        }

        jsonData.section_list.push(newData)
    })

    // Process
    const jsonInput = document.createElement("input")
    jsonInput.setAttribute('type', 'text')
    jsonInput.setAttribute('name', 'json-data')
    jsonInput.setAttribute('value', JSON.stringify(jsonData))
    jsonInput.classList.add('d-none')

    // Submit
    elmForm.appendChild(jsonInput)
    elmForm.submit()
}

function elementFormItem(element) {
    const uname = element.getAttribute('id')
    const elmLabel = element.querySelector(`#${uname}-label`)
    const elmImage = element.querySelector(`#${uname}-image`)
    const elmInput = element.querySelector(`#${uname}-input`)
    const elmType = element.querySelector(`#${uname}-type`)
    const btnDelete = element.querySelector(`#${uname}-delete`)

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
            elmImage.innerHTML = `
                <img class="image" src="../assets/img/qristes.png" alt="">
                <input type="file" class="image-input d-none" name="${uname}-image" accept="image/png, image/jpeg">
            `
            elmImage.classList.remove('d-none')
            // actionElmImage()

        } else {
            elmImage.classList.add('d-none')
            elmImage.innerHTML = ''
        }
    })

    btnDelete.addEventListener('click', () => {
        element.innerHTML = ''
        element.remove()
    })
}

function generateIncrementNumber() {
    globalCounter += 1
    return globalCounter
}
