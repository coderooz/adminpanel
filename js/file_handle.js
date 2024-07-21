/**
 * Returns the information for the file uploaded in the web page
 * @param {String} inp takes the file info
 * @returns {String} A json string; 
 */
function input_file_info(inp) {
    let files = inp.files||inp.target.files||inp;
    let fileCount = data_count(files);
    if (fileCount == 1) {
        let fileData = {
            name: files[0].name,
            size: files[0].size,
            type: files[0].type,
            fileExt: fileExt(files[0].name),
            lastModified: files[0].lastModified,
            lastModifiedDate: files[0].lastModifiedDate,
        }
        return json_convert(fileData);
    } else {
        let data = {}
        for (let i = 0; i < fileCount; i++) {
            file = files[i]
            let fileData = {
                name: file.name,
                size: file.size,
                type: file.type,
                fileExt: fileExt(file.name),
                lastModified: file.lastModified,
                lastModifiedDate: file.lastModifiedDate,
            }
            data[i] = fileData;
        }
        return json_convert(data);
    }
}

/**
 * fileExt is a function that gets the file extention of a file
 * @param {String} fileName 
 * @returns {String}
 */
function fileExt(fileName) {
    return fileName.split('.').pop();
}

/**
 * Returns the base name of the file
 * @param {String} fileName 
 * @returns {String}
 */
function get_fileBase(fileName) {
    var base = new String(fileName).substring(fileName.lastIndexOf('/') + 1);
    // if(base.lastIndexOf(".") != -1){
    //     base = base.substring(0, base.lastIndexOf("."));
    // }       
    return base;
}

