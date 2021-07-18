import select from './elems.js';
export const read = (blob, whatWeWant = 'url', cb) => {
    const reader = new FileReader();
    reader.onload = () => {
        cb(reader.result, reader)
    };
    if (whatWeWant.toLowerCase() === 'url') reader.readAsDataURL(blob);
    if (whatWeWant.toLowerCase() === 'content') reader.readAsText(blob);
    if (whatWeWant.toLowerCase() === 'binary') reader.readAsBinaryString(blob);
}
export const parseFileInput = (e, inputId) => {
    const file = e.target.files[0];
    const img = select(`[data-img-for=${inputId}]`).cond('tag', 'img');
    const url = URL.createObjectURL(file);
    img.setAttr('src', url);
}
/**
 *
 * @param string 'haider '
*/
export const filesCallback = (e, _, i) => {
    const dataType = select('[data-input]').attr('type')[i];
    const inputId = select('[data-input]').attr('data-input')[i];
    if (dataType.toLowerCase() === 'file') parseFileInput(e, inputId);
}
