# Student-Athletes
### Parallel Arrays
5 parallel arrays pre-populated with dummy data, including two students with the same name but different student IDs

Array 1 - Names of athletes  
Array 2 - Student ID (100-130)  
Array 3 - Sport (basketball, football, volleyball)  
Array 4 - Number of votes (0-30)  
Array 5 - GPA   

### Functions
The 4 functions that decide: 
1) How many players in each sport  
2) Top vote getter in each sport (for Player-of-the-Year for that sport)  
3) Student athlete of the year, who needs to have played more than one sport and have a GPA higher than the average GPA of all athletes..if they don't, then the player with the highest GPA of all athletes wins   
4) For an honorable mention, award a student in each sport (cant be awarded to an existing Top vote getter or Student Athlete of the year) based on GPA and VOTES  

### Array Explanation
| Index | Name    | ID  | Sport | Vote | GPA |
|-------|---------|-----|-------|------|-----|
| 0     | Alice   | 101 | vball | 12   | 3.5 |
| 1     | Bob     | 102 | bball | 22   | 3.7 |
| 2     | Charlie | 103 | bball | 4    | 4.0 |
| 3     | Bob     | 102 | vball | 22   | 3.7 |
| 4     | Bob     | 104 | fball | 17   | 3.8 |
