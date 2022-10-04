import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class fibonacci {

    public static void main(String[] args) {

        try (Scanner scanner = new Scanner(System.in)) {

            List<Integer> sequence = new ArrayList<>();

            sequence.add(0);
            sequence.add(1);

            System.out.print("Type the desired length for the Fibonacci Sequence: ");

            int i = 0;
            int j = Integer.parseInt(scanner.nextLine());

            while (i < j - 2) {
                int nextNumber = CalculateNextNumber(sequence.get(i), sequence.get(i + 1));
                sequence.add(nextNumber);
                i++;
            }

            int k = 0;
            while (k < sequence.size()) {
                System.out.print(sequence.get(k) + " ");
                k++;
            }

        } catch (NumberFormatException e) {
            e.printStackTrace();
        }

    }

    public static int CalculateNextNumber(int a, int b) {
        return a + b;
    }
}
