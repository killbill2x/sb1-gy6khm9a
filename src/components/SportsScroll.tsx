import React, { useRef } from 'react';

interface SportIcon {
  icon: string;
  name: string;
}

// Import your images
import dartsIcon from '../assets/icons/darts.png';
import billiardsIcon from '../assets/icons/billiards.png';
// ... import other icons similarly

const sports: SportIcon[] = [
  { icon: dartsIcon, name: 'Darts' },
  { icon: billiardsIcon, name: 'Billiards' },
  // ... add other sports with their respective imported icons
];

export function SportsScroll() {
  const scrollRef = useRef<HTMLDivElement>(null);
  const isDragging = useRef(false);
  const startX = useRef(0);
  const scrollLeft = useRef(0);
  const momentum = useRef(0);
  const lastTime = useRef(0);
  const lastScrollLeft = useRef(0);

  const handleMouseDown = (e: React.MouseEvent) => {
    isDragging.current = true;
    startX.current = e.pageX - (scrollRef.current?.offsetLeft || 0);
    scrollLeft.current = scrollRef.current?.scrollLeft || 0;
    lastTime.current = Date.now();
    lastScrollLeft.current = scrollRef.current?.scrollLeft || 0;
  };

  const handleTouchStart = (e: React.TouchEvent) => {
    isDragging.current = true;
    startX.current = e.touches[0].pageX - (scrollRef.current?.offsetLeft || 0);
    scrollLeft.current = scrollRef.current?.scrollLeft || 0;
    lastTime.current = Date.now();
    lastScrollLeft.current = scrollRef.current?.scrollLeft || 0;
  };

  const handleMouseMove = (e: React.MouseEvent) => {
    if (!isDragging.current) return;
    e.preventDefault();
    handleDrag(e.pageX);
  };

  const handleTouchMove = (e: React.TouchEvent) => {
    if (!isDragging.current) return;
    handleDrag(e.touches[0].pageX);
  };

  const handleDrag = (pageX: number) => {
    const x = pageX - (scrollRef.current?.offsetLeft || 0);
    const walk = (x - startX.current) * 2;
    if (scrollRef.current) {
      scrollRef.current.scrollLeft = scrollLeft.current - walk;
      
      // Calculate momentum
      const currentTime = Date.now();
      const timeElapsed = currentTime - lastTime.current;
      if (timeElapsed > 0) {
        const currentScrollLeft = scrollRef.current.scrollLeft;
        const distance = currentScrollLeft - lastScrollLeft.current;
        momentum.current = distance / timeElapsed;
        lastTime.current = currentTime;
        lastScrollLeft.current = currentScrollLeft;
      }
    }
  };

  const handleMouseUp = () => {
    isDragging.current = false;
    applyMomentum();
  };

  const handleTouchEnd = () => {
    isDragging.current = false;
    applyMomentum();
  };

  const applyMomentum = () => {
    let currentMomentum = momentum.current;
    const animate = () => {
      if (Math.abs(currentMomentum) < 0.1 || !scrollRef.current) return;
      
      scrollRef.current.scrollLeft += currentMomentum * 16;
      currentMomentum *= 0.95;
      
      if (scrollRef.current.scrollLeft >= scrollRef.current.scrollWidth - scrollRef.current.clientWidth) {
        scrollRef.current.scrollLeft = 0;
      } else if (scrollRef.current.scrollLeft <= 0) {
        scrollRef.current.scrollLeft = scrollRef.current.scrollWidth - scrollRef.current.clientWidth;
      }
      
      requestAnimationFrame(animate);
    };
    
    requestAnimationFrame(animate);
  };

  return (
    <div className="w-full bg-black/80 backdrop-blur-sm py-6 border-b border-white/10">
      <div 
        ref={scrollRef}
        className="flex overflow-x-scroll gap-6 px-4 scroll-smooth select-none"
        onMouseDown={handleMouseDown}
        onMouseMove={handleMouseMove}
        onMouseUp={handleMouseUp}
        onMouseLeave={handleMouseUp}
        onTouchStart={handleTouchStart}
        onTouchMove={handleTouchMove}
        onTouchEnd={handleTouchEnd}
      >
        {[...sports, ...sports].map((sport, index) => (
          <button
            key={`${sport.name}-${index}`}
            className="flex-shrink-0 flex flex-col items-center gap-3 text-gray-400 hover:text-white transition-colors group"
          >
            <div className="w-20 h-20 rounded-2xl bg-[#1a1a1a] flex items-center justify-center relative">
              <div className="absolute inset-0 rounded-2xl bg-gradient-to-br from-blue-500/20 to-purple-500/20 p-[1px]">
                <div className="absolute inset-0 rounded-2xl bg-[#1a1a1a]" />
              </div>
              <div className="relative z-10 w-8 h-8">
                <img 
                  src={sport.icon} 
                  alt={sport.name}
                  className="w-full h-full object-contain filter brightness-0 invert group-hover:brightness-100 group-hover:invert-0 transition-all"
                />
              </div>
              <div className="absolute inset-0 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-500 opacity-0 group-hover:opacity-10 transition-opacity" />
            </div>
            <span className="text-xs font-medium uppercase tracking-wide">{sport.name}</span>
          </button>
        ))}
      </div>
    </div>
  );
}