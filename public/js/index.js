// import ajaxApi from "./ajax.js";
import { filesCallback }  from "./inputs.js";
import select from "./elems.js";
import magnifier from "./magnify.js"
select('[data-input]').on('change', (e, _, i) => {
    filesCallback(e, _, i);
    magnifier('[data-magnify]', 2)
});
// ajaxApi()
//     .then(() => {
//         console.log('%cDone ajax request!!', `
//             background-color: #00f;
//             color: #fff;
//             padding: 20px;
//         `)
//     })
