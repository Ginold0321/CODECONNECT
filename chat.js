function sendMessage() {
    var msgInput = document.getElementById('message');
    var message = msgInput.value;
    if (message.trim() === '') return;

    var chatBox = document.getElementById('chat-box');
    var messageDiv = document.createElement('div');
    messageDiv.className = 'message';
    messageDiv.innerText = message;

    chatBox.appendChild(messageDiv);
    chatBox.scrollTop = chatBox.scrollHeight;

    msgInput.value = '';

    // Send message to server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_message.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('message=' + encodeURIComponent(message));
}
