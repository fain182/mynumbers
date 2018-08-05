export function createMetricAPI(name, url, selector) {
  return fetch("http://127.0.0.1:8000/metrics", {
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json"
    },
    body: JSON.stringify({ name, url, selector })
  }).then(response => {
    return response.json();
  });
}
