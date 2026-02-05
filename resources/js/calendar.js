export const verifyCalendar=()=>{
    const dateFrom=document.getElementById('fromDate');
    const dateTo=document.getElementById('toDate');

    if(!dateFrom || !dateTo) return;

    dateFrom.addEventListener('change',function(){
        dateTo.min = this.value;

        if(dateTo.value && dateTo.value < this.value){
            dateTo.value = this.value
        }
    })

    if(dateFrom.value){
        dateTo.min=dateFrom.value
    }
}