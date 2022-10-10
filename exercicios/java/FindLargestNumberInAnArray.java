import java.util.Scanner;

public class FindLargestNumberInAnArray {

    public static void main(String args[]) {
        Scanner scanner = new Scanner(System.in);
        String[] arrayString = scanner.nextLine().split(" ");
        int[] arrayInteger = new int[arrayString.length];

        for (int i = 0; i < arrayString.length; i++) {
            arrayInteger[i] = Integer.parseInt(arrayString[i]);
        }

        System.out.println(getLargest(arrayInteger));

        scanner.close();

    }

    public static int getLargest(int[] a) {
        int total = a.length;
        int temp;
        for (int i = 0; i < total; i++) {
            for (int j = i + 1; j < total; j++) {
                if (a[i] > a[j]) {
                    temp = a[i];
                    a[i] = a[j];
                    a[j] = temp;
                }
            }
        }
        return a[total - 1];
    }

}