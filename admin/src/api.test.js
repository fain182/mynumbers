import { createMetricAPI } from "./api";

test("creates a metric", () => {
  expect.assertions(1);
  var expected = {
    name: "pippo",
    url: "http://www.google.it",
    selector: "#my_id"
  };
  return expect(
    createMetricAPI("pippo", "http://www.google.it", "#my_id")
  ).resolves.toEqual(expected);
});
