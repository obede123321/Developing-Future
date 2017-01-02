function checkbrute($user_id, $mysqli) {
    // Registra a hora atual 
    $now = time();
 
    // Todas as tentativas de login são contadas dentro do intervalo das últimas 1 horas. 
    $valid_attempts = $now - (1 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts <code><pre>
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Executa a tarefa pré-estabelecida. 
        $stmt->execute();
        $stmt->store_result();
 
        // Se houver mais do que 5 tentativas fracassadas de login 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}