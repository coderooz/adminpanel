/**
 * 
 * @param {object} elem 
 * @param {String} attr 
 * @param {String} oldAttr 
 * @param {String} newAttr 
 */
function changeAttrValue(elem, attr, oldAttr, newAttr){
    if(hasAttrValue(elem, attr, oldAttr)){
        let data = {};
        data[attr] = elem.getAttribute(attr).replace(oldAttr, newAttr);
        add_attrs(elem, data, true);
    }
    return false;
}

/**
 * 
 * @param {object} elem 
 * @param {string} attr 
 * @param {string} attrValue 
 */
function hasAttrValue(elem, attr, attrValue){
    if(elem.hasAttribute(attr)){
        let data = elem.getAttribute(attr);
        return data_exists(data, attrValue);
    }
    return false;
}


/**
 * This function:- "appenElem()" take a element and append the data to it.
 * @param {String} elem Takes where is to appended.
 * @param {String} data Takes what is to be appended. 
 */
function appenElem(elem, data){
    elem.appendChild(data);
}

/**
 * deleteElem takes the element and removes it from the dom 
 * @param {object} elem
*/
function deleteElem(elem){
    elem.remove();
}

function removeAttr(elem, attr){
    elem.removeAttribute(attr);
}


function removeAttrValue(elem, attr, attrValue){
    if(hasAttrValue(elem, attr, attrValue)){
        elem.setAttribute(attr, elem.getAttribute(attr).replace(attrValue, ''));
    }
    return string;
}

/**
 * create_elements func creates new elements
 * @param {String} elem 
 * @param {object} attrs
 * @returns {object}
 */
function create_elements(elem, attrs=null) {
    let node = document.createElement(elem);
    if(attrs!==null){for(let key in attrs){
            node.setAttribute(key, attrs[key]);
        }
    }
    return node;
}

/**
 * add_attrs() task is to add attributes to a dom element
 * @param {object} elem 
 * @param {object} attrs 
 */
function add_attrs(elem, attrs, attrChange=false) {
    for (let attr in attrs) {
        if(attrChange){
            elem.setAttribute(attr, attrs[attr]);
        } else {
            if(elem.hasAttribute(attr)){
                if (hasAttrValue(elem, attr, attrs[attr]) === false){
                    elem.setAttribute(attr, elem.getAttribute(attr)+' '+attrs[attr]);
                }
            } else {
                elem.setAttribute(attr, attrs[attr]);
            }
        }
    }
}

function windLoad(func) {
    func;
}


/**
 * @param {string} method
 * @param {string} url
 * @param {string} data
 * @param {objects} headers
 * @returns 
*/
function httpGet(method, url, data, headers=null){
    let xmlHttp=new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){if (xmlHttp.readyState==4 && xmlHttp.status == 200){return xmlHttp.responseText;}}  
    xmlHttp.open(method, url);
    if(headers!==null){for(let header in headers){xmlHttp.setRequestHeader(header, headers[header]);}}
    xmlHttp.send(data);  
}


/**  
 * @param {object} elem 
 * @param {String} eventType
 * @param {Function} func
 */
function eventlisten(elem, eventType, func) {
    if(document.contains(elem)){elem.addEventListener(eventType, func);}
}

/** 
 * 
 * @param {object} elem 
 * @param {String} eventType
 */
function removeListen(elem, eventType, func) {
    elem.removeEventListener(eventType, func);
}

/**
 * script_input() is a specially function that checks and add the data_handle.js file in the html file if it does not exists in the file already  
 * @param {String} file_name 
 * @param {String} appendPart
 */
function script_input(file_name, appendPart='body'){
    let scripts = document.querySelectorAll('script');
    let file_exist = false;
    scripts.forEach(element => {
        if(element.hasAttribute('src')){
            if(get_fileBase(element.src) == file_name){
                file_exist = true;
            }
        }
    });
    if(file_exist == false){
        let code = create_elements('script', 'src', file_name);
        appenElem(appendPart, code);
    }
}



// function input_file_info(e){
//     console.log(e);
// }