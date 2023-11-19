function updateTotal() {
    var checkedColorCheckboxes = document.querySelectorAll('.colors:checked');
    var numberOfCheckedColor = checkedColorCheckboxes.length;

    var checkedSizeCheckboxes = document.querySelectorAll('.sizes:checked');
    var numberOfCheckedSize = checkedSizeCheckboxes.length;
    
    // Retrieve and display color and size names based on checkbox ID
    checkedColorCheckboxes.forEach(function (checkbox) {
        var colorLabel = document.querySelector('label[for="' + checkbox.id + '"]');
        console.log('Selected Color Name: ' + colorLabel.textContent);
    });

    checkedSizeCheckboxes.forEach(function (checkbox) {
        var sizeLabel = document.querySelector('label[for="' + checkbox.id + '"]');
        console.log('Selected Size Name: ' + sizeLabel.textContent);
    });

    var total = numberOfCheckedColor * numberOfCheckedSize;

    // Clear existing rows
    var tableBody = document.querySelector('.table-group-divider');
    tableBody.innerHTML = '';

    // Create new rows based on the total
    for (var i = 0; i < total; i++) {
        var table = document.querySelector('.table');
        table.classList.remove('hidden');

        var row = tableBody.insertRow(i);

        for (var j = 0; j < 5; j++) {
            var cell = row.insertCell(j);

            if (j === 2 || j === 3) {
                // Disable inputs for Size and Color columns
                var input = document.createElement('input');
                input.type = 'number';
                input.name = j === 2 ? 'size[]' : 'color[]'; // Set the name based on column
                input.id = '';
                input.disabled = true;
                cell.appendChild(input);
            } else if (j === 4) {
                // File input for Image column
                var fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.name = 'image[]';
                fileInput.id = '';
                cell.appendChild(fileInput);
            } else {
                // Number inputs for other columns
                var numberInput = document.createElement('input');
                numberInput.type = 'number';
                numberInput.name = '';
                numberInput.id = '';
                cell.appendChild(numberInput);
            }
        }
    }


}

const colorIdCheckboxes = document.getElementsByClassName('colors');
for (var i = 0; i < colorIdCheckboxes.length; i++) {
    colorIdCheckboxes[i].addEventListener('click', updateTotal);
}

const sizeIdCheckboxes = document.getElementsByClassName('sizes');
for (var i = 0; i < sizeIdCheckboxes.length; i++) {
    sizeIdCheckboxes[i].addEventListener('click', updateTotal);
}
