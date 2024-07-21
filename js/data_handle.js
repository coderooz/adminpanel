/**functions Made Here
 * data_exists(data, tocheck), str_split(data, spliter='', limit=null), merger(data, merg), stringCase(data, dataTo), data_trim(data), get_charCode(numb), print(data), get_chr_pos(data, posi, unicode=false), data_count(data), get_type(data), timestamp_date(), 
 */

/** 
 *@param {object} data
*/
function json_convert(data) {
    return JSON.stringify(data);
}
/** 
 *@param {string} data
 *@param {boolean} fullInfo 
*/
function json_reader(data, fullInfo=false) {
    if (get_type(data) == 'string') {
        if (fullInfo == false) {
            return JSON.parse(data);
        } else if (fullInfo == true) {
            let dataLeng, dataKeys, dataValues, data;
            let out={};
            data=JSON.parse(data);
            dataLeng=data_count(data);
            dataKeys=Object.keys(data);
            dataValues=Object.values(data);

            out['length']=dataLeng;
            out['keys']=dataKeys;
            out['values']=dataValues;
            out['data']={};
            for (let i=0; i < dataLeng; i++) {
                out['data'][dataKeys[i]]=dataValues[i];
            }
            return out;
        }
    }
}
/**Kills the current process{PID}and exits the system*/
function sys_kill(message='', messType='error') {
    if (message !== '') {
        print(message, messType);
    }
    process.kill(process.pid);
}
/**Prints out data into the console*/
function print(data, messType='') {
    let type='';
    if (messType !== '') {
        if (messType == '') {
            type='Message -> '
        } else if (messType == 'log') {
            type='Log -> '
        } else if (messType == 'info') {
            type='Info -> '
        } else if (messType == 'warn') {
            type='Warn -> '
        } else if (messType == 'error') {
            type='Error -> '
        }
    }
    console.log(type+data);
}

/**
 * @param {*} data
 * @param {string} tocheck
 */
function data_exists(data, tocheck) {
    let dataType=get_type(data);
    let tocheckType=get_type(tocheck);
    if (dataType == 'string') {
        data=str_split(data, ' ');
    }
    if (tocheckType == 'string') {
        return data.includes(tocheck);
    } else if (tocheckType == 'object') {
        return data.includes(tocheck)
    }
    return false;
}
/**splites the str into letters*/
function str_split(data, spliter='', limit=null) {
    if (get_type(data) == 'string') {
        if (limit==null){limit=data_count(data);}
        return data.split(spliter, limit);
    }
}
/**Merges the data like array or js object with the given merger*/
function merger(data, merg) {
    if ((get_type(data) !== 'string') && (get_type(data) !== 'number')) {
        return data.join(merg);
    }
}
/**Returns the string in lower or upper as specified in dataTo*/
function stringCase(data, dataTo) {
    if ((dataTo == 1) || (dataTo == 'upper') || (dataTo == 'u')) {
        return data.toLocaleUpperCase();
    } else if ((dataTo == 0) || (dataTo == 'lower') || (dataTo == 'l')) {
        return data.toLocaleLowerCase();
    }
}
/**Returns data and trims the unwanted spaces*/
function data_trim(data) {
    return data.trim();
}
/**Returns the charecter converted from Unicode number*/
function get_charCode(numb) {
    return String.fromCharCode(numb);
}

/**Returns the cheracter at the given position*/
function get_chr_pos(data, posi, unicode=false) {
    if ((get_type(data) == 'string') && (get_type(posi) == 'number') && (data_count(data) > posi)) {
        if (unicode == true) {
            return data.charCodeAt(posi);
        } else {
            return data.charAt(posi);
        }
    }
}
/**Returns the number of data points*/
function data_count(data) {
    if (get_type(data) == 'object') {
        data=Object.keys(data);
    }
    return data.length;
}
/**Returns the type of data*/
function get_type(data){return typeof(data);}
/**Returns the timestamp*/
function timestamp_date(){let curemt, weekdays, year, month, date, day, hrs, min, sec, mil_sec;curemt=new Date();weekdays=new Array(7);weekdays[0]="Sunday";weekdays[1]="Monday";weekdays[2]="Tuesday";weekdays[3]="Wednesday";weekdays[4]="Thursday";weekdays[5]="Friday";weekdays[6]="Saturday";year=curemt.getFullYear();month=curemt.getMonth();date=curemt.getDate();day=weekdays[curemt.getDay()];hrs=curemt.getHours();min=curemt.getMinutes();sec=curemt.getSeconds();mil_sec=curemt.getUTCMilliseconds();return day+','+year+'/'+month+'/'+date+' '+hrs +':'+ min+':'+sec+':'+mil_sec;}
function dragElement(e){let n=0,t=0,o=0,u=0;function d(e){(e=e||window.event).preventDefault(),o=e.clientX,u=e.clientY,document.onmouseup=m,document.onmousemove=l}function l(d){(d=d||window.event).preventDefault(),n=o-d.clientX,t=u-d.clientY,o=d.clientX,u=d.clientY,e.style.top=e.offsetTop-t+"px",e.style.left=e.offsetLeft-n+"px"}function m(){document.onmouseup=null,document.onmousemove=null}document.getElementById(e.id+"header")?document.getElementById(e.id+"header").onmousedown=d:e.onmousedown=d}