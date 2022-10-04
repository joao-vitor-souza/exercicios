import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Random;
import java.util.Scanner;

public class sortArray {

    public static void main(String[] args) {

        try (Scanner scanner = new Scanner(System.in)) {
            Random generator = new Random();
            List<Integer> randomNumbers = new ArrayList<>();

            System.out.print("Type the desired length of the random number list: ");
            int listLength = Integer.parseInt(scanner.nextLine());

            int i = 0;
            while (i < listLength) {
                int randomNumber = generator.nextInt(100);
                randomNumbers.add(randomNumber);
                i++;
            }

            System.out.print("\nUnsorted list: " + randomNumbers.toString());

            Collections.sort(randomNumbers);

            System.out.print("\nSorted list: " + randomNumbers.toString());
        } catch (NumberFormatException e) {
            e.printStackTrace();
        }

    }
}
