let table,row;

window.onload = function(){
    table = document.getElementById('table');
    for (row of table.rows){
        if (row.cells[1].nodeName != "TH"){
            row.cells[1].lastElementChild.addEventListener('click',(e)=>{
                e.preventDefault();
                e.target.parentNode.parentNode.remove();
            });
        }
    }
    row = document.getElementById('row');
    //delete = document.getElementsByClassName('delete')[0];
    document.getElementById('add').addEventListener('click',(e)=>{
        e.preventDefault();
        /**@type {HTMLTableRowElement} */
        let newRow = row.cloneNode(true);
        newRow.cells[1].lastElementChild.addEventListener('click',(e)=>{
            e.preventDefault();
            e.target.parentNode.parentNode.remove();
        });
        table.appendChild(newRow);
    });
}