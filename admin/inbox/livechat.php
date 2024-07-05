<?php
include "../header.php";

?>
<div class="max-w-full relative">
    <!-- component -->
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white border-r border-gray-300 sidebarArea">
            <!-- Sidebar Header -->
            <header class="p-4 border-b border-gray-300 flex justify-between items-center bg-indigo-600 text-white">
                <h1 class="text-2xl font-semibold">Chat Web</h1>
                <div class="relative">
                    <button onclick="toggleSidebar()" class="focus:outline-none">
                        <i class="fa-solid fa-bars text-3xl"></i>
                    </button>
                </div>
            </header>

            <!-- Contact List -->
            <div class="overflow-y-auto h-screen p-3 mb-9 pb-20" id="userChatList">


            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="flex-1">
            <!-- Chat Header -->
            <header class="bg-white p-4 text-gray-700">
                <h1 class="text-2xl font-semibold"><span onclick="showSidebar()" class="hidden showSideBarArea cursor-pointer"><i class="fa-solid fa-bars text-3xl ml-3"></i></span> Alice</h1>
            </header>

            <!-- Chat Messages -->
            <div id="livechatContent" class="h-[100vh] overflow-y-auto p-4 pb-36 relative bg-gray-300">
                <!-- Incoming Message -->

                <!-- Outgoing Message -->

            </div>
            <!-- Chat Input -->
            <footer class="bg-white border-t border-gray-300 p-4 fixed bottom-9 w-[56%]">
                <form action="" id="chatForm" method="post">
                    <div class="flex items-center ">
                        <input type="text" placeholder="Type a message..." class="chatInput w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                    </div>
                </form>
            </footer>


        </div>
    </div>
</div>
<script>
    const url = "../../database/livechat.php";
    // const randomID = Math.random().toString(16).slice(2);
    // const randomString = function() {
    //     return Date.now().toString(36) + Math.random().toString(36).substr(2);
    // }
    // const uniqueId = randomString() + randomID;
    // // console.log(uniqueId)



    function userList() {
        const data = {
            action: 'liveChatUserlist',
        }
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })

            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const allChatUser = data.allData;
                    const userChatList = document.getElementById('userChatList');
                    userChatList.innerHTML = '';

                    allChatUser.forEach(chat => {
                        // console.log(chat.name);
                        userChatList.innerHTML += `
                        <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md" onclick="currentUserId('${chat.id}')">
                            <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                                <img src="https://placehold.co/200x/ad922e/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-12 h-12 rounded-full">
                            </div>
                            <div class="flex-1">
                                <h2 class="text-lg font-semibold">${chat.name}</h2>
                                <p class="text-gray-600">That pizza place was amazing! We should go again sometime. 🍕</p>
                            </div>
                        </div>
                        `
                    })
                } else {
                    console.error('Failed to fetch messages:', data.message);
                }
            })
            .catch((error) => {
                console.error('Error: ', error);
            });
    }
    userList()
    setInterval(userList, 2000);

    function currentUserId(userId) {
        sessionStorage.setItem('messageUserId', userId);
        const data = {
            action: 'singleuser',
            message: userId
        };
        // console.log(JSON.stringify(data));
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const chatFetchData = data.data;
                    // console.log(chatFetchData);
                    const livechatContent = document.getElementById('livechatContent');
                    livechatContent.innerHTML = '';
                    chatFetchData.forEach(chat => {
                        const timestamp = chat.chat_time;
                        // console.log(chat);
                        if (chat.check_user == 0) {
                            livechatContent.innerHTML += `
                                <div class="flex justify-end mb-4 cursor-pointer">
                                    <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                                        <p>${chat.chat_text}</p>
                                    </div>
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                                        <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="My Avatar" class="w-8 h-8 rounded-full">
                                    </div>
                                </div>
                                `
                        } else {
                            livechatContent.innerHTML += `
                            <div class="flex mb-4 cursor-pointer">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                                    <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
                                </div>
                                <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                                    <p class="text-gray-700">${chat.chat_text}</p>
                                </div>
                            </div>
                             `
                        }
                    });
                } else {
                    console.error('Failed to fetch messages:', data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    let currentChatId = sessionStorage.getItem('messageUserId');
    if (currentChatId) {
        currentUserId(currentChatId);
    } 
    setInterval(() => {
        let updatedUserId  = sessionStorage.getItem('messageUserId'); 
        if (updatedUserId  !== currentChatId) {
            currentChatId = updatedUserId
            currentUserId(currentChatId);
        } else {
            currentUserId(currentChatId);
        }
    }, 2000);
    

    // window.onload = function() {
    //     let messageUserId = sessionStorage.getItem('messageUserId');
    //     if (messageUserId) {
    //         currentUserId(messageUserId);
    //         setInterval(() => currentUserId(messageUserId), 2000);
    //     } else {
    //         console.log("No user ID found in sessionStorage.");
    //     }
    // };

    // Insert Data
    document.getElementById('chatForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const chatInput = document.querySelector('.chatInput').value;
        let messageUserId = sessionStorage.getItem('messageUserId');
        const data = {
            action: 'insert',
            message: {
                chatInput: chatInput,
                chatUserTableId: messageUserId,
                massageUser: 0
            }
        };
        // console.log(JSON.stringify(data));
        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                // console.log('Success:', data);
                // Optionally, clear the input field or perform other actions
                document.querySelector('.chatInput').value = '';
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    });

    // toggle sidebar
    function toggleSidebar() {
        const sidebarArea = document.querySelector('.sidebarArea');
        const showSideBarArea = document.querySelector('.showSideBarArea');
        sidebarArea.classList.add('hidden');
        showSideBarArea.classList.remove('hidden');
    }
    // toggle sidebar
    function showSidebar() {
        const sidebarArea = document.querySelector('.sidebarArea');
        const showSideBarArea = document.querySelector('.showSideBarArea');
        sidebarArea.classList.remove('hidden');
        showSideBarArea.classList.add('hidden');
    }
</script>


<?php include "../footer.php" ?>