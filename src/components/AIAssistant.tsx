import React, { useState, useRef, useEffect } from 'react';
import { MessageSquare, X, Minimize2, Maximize2, Send } from 'lucide-react';

interface Message {
  id: string;
  type: 'user' | 'bot';
  content: string;
  timestamp: Date;
}

export function AIAssistant() {
  const [isOpen, setIsOpen] = useState(false);
  const [isExpanded, setIsExpanded] = useState(false);
  const [message, setMessage] = useState('');
  const [messages, setMessages] = useState<Message[]>([
    {
      id: '1',
      type: 'bot',
      content: "Hello! I'm RefBot, your LEAGUE MATE assistant. I can help you find teams, players, and answer any questions about our leagues. How can I assist you today?",
      timestamp: new Date()
    }
  ]);
  
  const messagesEndRef = useRef<HTMLDivElement>(null);

  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: "smooth" });
  };

  useEffect(() => {
    scrollToBottom();
  }, [messages]);

  const handleSend = () => {
    if (!message.trim()) return;

    // Add user message
    const userMessage: Message = {
      id: Date.now().toString(),
      type: 'user',
      content: message,
      timestamp: new Date()
    };

    setMessages(prev => [...prev, userMessage]);
    setMessage('');

    // Simulate bot response
    setTimeout(() => {
      const botMessage: Message = {
        id: (Date.now() + 1).toString(),
        type: 'bot',
        content: getBotResponse(message),
        timestamp: new Date()
      };
      setMessages(prev => [...prev, botMessage]);
    }, 1000);
  };

  const getBotResponse = (userMessage: string) => {
    const lowerMessage = userMessage.toLowerCase();
    
    if (lowerMessage.includes('team') || lowerMessage.includes('join')) {
      return "I can help you find the perfect team! What sport are you interested in, and what's your skill level?";
    }
    if (lowerMessage.includes('player') || lowerMessage.includes('recruit')) {
      return "Looking for players? I can help you find talented athletes for your team. What positions are you looking to fill?";
    }
    if (lowerMessage.includes('league')) {
      return "We have several active leagues across different sports. Would you like to browse available leagues or create your own?";
    }
    return "I'm here to help! Could you provide more details about what you're looking for?";
  };

  return (
    <div className={`fixed bottom-4 right-4 z-50 ${isOpen ? 'w-[380px]' : 'w-auto'}`}>
      {!isOpen ? (
        <button
          onClick={() => setIsOpen(true)}
          className="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded-xl shadow-lg transition-all duration-300 flex items-center gap-3"
        >
          <MessageSquare className="w-6 h-6 flex-shrink-0" />
          <div className="text-left">
            <div className="font-semibold">Need Help?</div>
            <div className="text-sm text-blue-100">AI-powered player & league matching</div>
          </div>
        </button>
      ) : (
        <div className={`bg-white rounded-lg shadow-xl overflow-hidden transition-all duration-300 ${isExpanded ? 'h-[80vh]' : 'h-[500px]'}`}>
          {/* Header */}
          <div className="bg-blue-600 p-4 flex items-center justify-between">
            <div className="flex items-center gap-3">
              <div className="relative">
                <div className="w-10 h-10 bg-white rounded-full overflow-hidden">
                  <div className="absolute inset-0 bg-gradient-to-br from-gray-900 to-gray-700">
                    <div className="absolute inset-2 bg-white rounded-full">
                      <div className="absolute inset-1 bg-gradient-to-br from-black to-gray-800 rounded-full">
                        <div className="absolute inset-1 flex items-center justify-center">
                          <div className="w-4 h-4 border-2 border-white rounded-full"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></div>
              </div>
              <div>
                <h3 className="font-bold text-white">RefBot</h3>
                <p className="text-blue-100 text-sm">AI Assistant</p>
              </div>
            </div>
            <div className="flex items-center gap-2">
              <button
                onClick={() => setIsExpanded(!isExpanded)}
                className="text-white hover:text-blue-100 transition-colors"
              >
                {isExpanded ? <Minimize2 className="w-5 h-5" /> : <Maximize2 className="w-5 h-5" />}
              </button>
              <button
                onClick={() => setIsOpen(false)}
                className="text-white hover:text-blue-100 transition-colors"
              >
                <X className="w-5 h-5" />
              </button>
            </div>
          </div>

          {/* Messages */}
          <div className="p-4 overflow-y-auto" style={{ height: 'calc(100% - 140px)' }}>
            {messages.map((msg) => (
              <div
                key={msg.id}
                className={`mb-4 flex ${msg.type === 'user' ? 'justify-end' : 'justify-start'}`}
              >
                <div
                  className={`max-w-[80%] rounded-lg p-3 ${
                    msg.type === 'user'
                      ? 'bg-blue-600 text-white'
                      : 'bg-gray-100 text-gray-800'
                  }`}
                >
                  <p className="text-sm">{msg.content}</p>
                  <span className="text-xs opacity-75 mt-1 block">
                    {msg.timestamp.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}
                  </span>
                </div>
              </div>
            ))}
            <div ref={messagesEndRef} />
          </div>

          {/* Input */}
          <div className="p-4 border-t">
            <div className="flex gap-2">
              <input
                type="text"
                value={message}
                onChange={(e) => setMessage(e.target.value)}
                onKeyPress={(e) => e.key === 'Enter' && handleSend()}
                placeholder="Type your message..."
                className="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
              <button
                onClick={handleSend}
                className="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-lg transition-colors"
              >
                <Send className="w-5 h-5" />
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}