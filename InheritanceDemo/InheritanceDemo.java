public class InheritanceDemo {
    public static void main(String[] args) {
        Vehicle vehicle = new Vehicle("Generic Vehicle", 2022);
        vehicle.start();
        vehicle.stop();

        System.out.println("------------------------");

        Car car = new Car("Toyota", 2023, 4);
        car.start();
        car.stop();
    }
}
