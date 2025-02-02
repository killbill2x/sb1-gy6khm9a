import React, { useEffect, useState } from 'react';
import { Shield, Trophy, Users, ChevronRight } from 'lucide-react';
import { AIAssistant } from './components/AIAssistant';
import { SportsScroll } from './components/SportsScroll';

function App() {
  const [isVisible, setIsVisible] = useState(false);

  useEffect(() => {
    setIsVisible(true);
  }, []);

  return (
    <div className="min-h-screen bg-black text-white">
      {/* Navigation */}
      <nav className="fixed top-0 left-0 right-0 z-50 bg-black/90 backdrop-blur-sm border-b border-white/10">
        <div className="container mx-auto px-4 py-4">
          <div className="flex items-center justify-between">
            <div className="flex items-center space-x-2">
              <img src="https://i.imgur.com/x0jyF6p.png" alt="LEAGUE MATE" className="w-12 h-12 object-contain" />
              <span className="text-2xl font-bold text-white">LEAGUE MATE</span>
            </div>
            <div className="hidden md:flex items-center space-x-8">
              <a href="#" className="text-gray-300 hover:text-white transition-colors">Features</a>
              <a href="#" className="text-gray-300 hover:text-white transition-colors">Leagues</a>
              <a href="#" className="text-gray-300 hover:text-white transition-colors">About</a>
              <button className="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full font-bold transition-all">
                Join Now
              </button>
            </div>
          </div>
        </div>
      </nav>

      {/* Hero Section */}
      <section className="relative h-screen flex items-center justify-center overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-blue-900/50 to-black/90 z-10"></div>
        <video
          autoPlay
          muted
          loop
          playsInline
          className="absolute inset-0 w-full h-full object-cover"
        >
          <source src="https://player.vimeo.com/external/434045526.sd.mp4?s=c27eecc69a27dbc4ff2b87d38afc35f1a9e7c02d&profile_id=164&oauth2_token_id=57447761" type="video/mp4" />
        </video>
        
        <div className="relative z-20 w-full">
          {/* Sports Icons Scroll */}
          <SportsScroll />
          
          <div className="container mx-auto px-4 text-center mt-12">
            <div className="w-48 h-48 mx-auto mb-8">
              <img src="https://i.imgur.com/x0jyF6p.png" alt="LEAGUE MATE" className="w-full h-full object-contain animate-float" />
            </div>
            <h1 className={`text-6xl md:text-8xl font-bold mb-6 transform transition-all duration-1000 ${isVisible ? 'translate-y-0 opacity-100' : 'translate-y-20 opacity-0'}`}>
              LEAGUE MATE
            </h1>
            <p className={`text-xl md:text-2xl mb-8 transform transition-all duration-1000 delay-300 ${isVisible ? 'translate-y-0 opacity-100' : 'translate-y-20 opacity-0'}`}>
              Join leagues, find teammates, and compete in your favorite interests
            </p>
            <div className={`flex justify-center gap-4 transform transition-all duration-1000 delay-500 ${isVisible ? 'translate-y-0 opacity-100' : 'translate-y-20 opacity-0'}`}>
              <button className="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-bold text-lg transition-all">
                Join Now
              </button>
              <button className="border-2 border-white hover:bg-white hover:text-black px-8 py-3 rounded-full font-bold text-lg transition-all">
                Learn More
              </button>
            </div>
          </div>
        </div>
      </section>

      {/* Features Section */}
      <section className="py-20 bg-gradient-to-b from-black to-blue-900">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <FeatureCard 
              icon={<Shield className="w-8 h-8" />}
              title="Manage Leagues"
              description="Manage your league or find players, long-term or subs"
            />
            <FeatureCard 
              icon={<Users className="w-8 h-8" />}
              title="Join a League"
              description="Find the perfect league that matches your skill level"
            />
            <FeatureCard 
              icon={<Trophy className="w-8 h-8" />}
              title="Compete & Win"
              description="Play matches, track your progress, and win championships"
            />
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-blue-900">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-4xl md:text-5xl font-bold mb-8">Ready to Level Up?</h2>
          <p className="text-xl mb-12 max-w-2xl mx-auto">
            Join thousands of athletes who have taken their game to the next level with LEAGUE MATE.
          </p>
          <button className="group bg-white text-blue-900 hover:bg-blue-100 px-8 py-3 rounded-full font-bold text-lg transition-all flex items-center mx-auto">
            Get Started
            <ChevronRight className="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" />
          </button>
        </div>
      </section>

      {/* AI Assistant */}
      <AIAssistant />
    </div>
  );
}

function FeatureCard({ icon, title, description }) {
  return (
    <div className="bg-blue-900/30 backdrop-blur-sm p-8 rounded-2xl border border-blue-800 hover:border-blue-600 transition-all">
      <div className="text-blue-400 mb-4">{icon}</div>
      <h3 className="text-xl font-bold mb-2">{title}</h3>
      <p className="text-gray-400">{description}</p>
    </div>
  );
}

export default App;