const axios = require("axios");

export function createMetricAPI(name, url, selector) {
  return new Promise(function(resolve, reject) {
    axios
      .post("http://127.0.0.1:8000/metrics", { name, url, selector })
      .then(result => {
        resolve(result.data);
      })
      .catch(error => {
        if (error.response) {
          reject(error.response.data);
          return;
        }
        if (error.request) {
          console.log(error.request);
          reject(error.request);
          return;
        }
        reject(error.message);
      });
  });
}
