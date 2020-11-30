
function checkSeason(selected,planted){
    let season = JSON.parse(document.getElementById('date-message').dataset.plantingTimes)[selected];
    let dateInputMonth=new Date(planted).getMonth()
    if(season.seasonstart>season.seasonend){
        return (dateInputMonth >= season.seasonstart || dateInputMonth<= season.seasonend)
    }
        return (dateInputMonth>=season.seasonstart && dateInputMonth>=season.seasonend)
    
    }