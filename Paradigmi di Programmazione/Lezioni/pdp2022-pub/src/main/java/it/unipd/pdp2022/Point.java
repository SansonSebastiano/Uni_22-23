package it.unipd.pdp2022;

public class Point {
  public int x, y;

  public Point(int x, int y) {
    this.x = x;
    this.y = y;
  }

  public Point twoTimes() {
    x = x * 2;
    y = y * 2;
    return this;
  }
}
