import { createMetricAPI } from "./api";

test("creates a metric", () => {
  expect.assertions(1);
  var expected = {
    name: "pippo",
    url: "http://ww.google.it",
    selector: "#my_id"
  };
  return expect(
    createMetricAPI("pippo", "http://ww.google.it", "#my_id")
  ).resolves.toEqual(expected);
});
