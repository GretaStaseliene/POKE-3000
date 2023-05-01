<?php

// include('config.php');

// $output = '';

// if (isset($_POST['query'])) {
//     $serachValue = $_POST['query'];
//     $search = "SELECT * FROM users WHERE first_name LIKE '$serachValue%'";
//     $result = $db->query($search);

//     if ($result->num_rows > 0) {
//         $output .= '<thead>
//                         <tr>
//                             <th>Vardas</th>
//                             <th>Pavardė</th>
//                             <th>El. paštas</th>
//                             <th>Poke skaičius</th>
//                             <th></th>
//                         </tr>
//                     </thead>
//                     <tbody>';
//                     while($row = $result->fetch_assoc()) {
//                         $output .= '<tr>
//                                         <td>' . $row['first_name'] . '</td>
//                                         <td>' . $row['last_name'] . '</td>
//                                         <td>' . $row['email'] . '</td>
//                                         <td><span id="value" value="counter"></span></td>
//                                         <td><button class="btn btn-primary" id="submit">Poke</button></td>
//                                     </tr>';
//                     }
//                     $output .= '</tbody>';
//                     echo $output;
//     } else {
//         echo "<h6>Vartotojas nerastas</h6>";
//     }
// }
